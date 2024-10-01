/* jshint -W117 */
/* jshint -W098 */

(function($){

    $.fn.spidochetube = function(options){

        //Set the option
        var settings = $.extend({
            key              : "",
            sources          : "playlist",
            id               : "GoogleDevelopers",  // youtube user id is case sensitive
            max_results      : 10,
            title_show       : 1,
            desc_show        : 0,
            thumb_show       : 1,
            theme            :'dark',
            paging           : 0,
            pagingTxt        : 'More',
            scroll_duration  : 0,
            orderBy          : 'relevance',
            first_load       : true
        },options);

        //Stop the script here if no api key
        if(settings.key === ""){
            console.log('api key not defined');
            return;
        }

        return this.each(function(){

            var $this = $(this);
            var max_results = 0;
            var total_results = 0;
            var id = settings.id;
            var url= "";
            var next_page = "";
            var next_page_data = "";
            var first_load = settings.first_load;

            // Get the max results to display per page
            if(settings.max_results <= 50){
                max_results = settings.max_results;
            }else{
                max_results = 50;
            }

            // Add The Player container and the playlist container HTML only once
            if(first_load === true){
                init_item_click($this, settings.scroll_duration);
                $this.html('<div class="spidochetube_inner"><div id="spidochetube_player"></div><ul id="spidochetube_list"></ul></div>');

                if(settings.paging === "loadmore"){
                    $('#spidochetube_list').after('<a id="spidochetube_loadmore" href="#">'+settings.pagingTxt+'</a>');
                }
            }

            // get next page token
            next_page_data = $('#spidochetube_loadmore').attr('data-next');

            if(next_page_data !== undefined){
                next_page = next_page_data;
            }

            // Build the url
            if(settings.sources === "playlist"){

                url ="https://www.googleapis.com/youtube/v3/playlistItems?playlistId="+id+"&pageToken="+next_page+"&maxResults="+max_results+"&key="+settings.key+"&part=snippet,status,contentDetails";

            } else {

                // URL For Channel.
                url = "https://www.googleapis.com/youtube/v3/search?key="+settings.key+"&channelId="+id+"&part=snippet,id&order="+settings.orderBy+"&maxResults="+max_results;

                /**
                 * Remove 'More' button, if data load from channel.
                 * This is unfinished work.
                 * Loadmore button and number pagination feature will be added soon.
                 */
                $('#spidochetube_loadmore').remove();

            }

            //Connect to youtube via json
            $.getJSON(url,function(data){

                // Get the total results
                total_results = data.pageInfo.totalResults;
                next_page = data.nextPageToken;

                if(settings.sources === "playlist"){

                    $.each(data.items, function(index,item){

                        // inspect the item object to know all the information available
                        // console.log(item);

                        // Get the video information
                        var snippet = item.snippet;
                        var title = snippet.title;
                        var description = snippet.description;
                        var status = item.status.privacyStatus;
                        var video_id  = "";
                        var thumb_url = "";
                        var video_url = "";

                        // Do not show video that display error message
                        if(status !== "public") {
                            return;
                        }

                        // Do not show video without thumbnail (no thumbnail === no available)
                        if(snippet.thumbnails !== undefined){
                            video_id  = snippet.resourceId.videoId;
                            thumb_url = snippet.thumbnails.medium.url; // get medium quality thumb url
                            video_url = "https://www.youtube.com/embed/"+video_id;
                        }else{
                            return;
                        }

                        // Create the html
                        html  = '<li>';
                        html += '<a title="'+title+'" href="'+video_url+'" data-youtubeID="'+video_id+'">';
                        html += (1 === parseInt(settings.thumb_show)) ? '<img src="'+thumb_url+'" alt="'+title+'" />' : '';
                        html += (1 === parseInt(settings.title_show)) ? '<span>'+title+'</span>' : '';
                        html += (1 === parseInt(settings.desc_show)) ? '<span class="wpgp-sct-desc">'+description+'</span>' : '';
                        html += '</a>';
                        html += '</li>';

                        // Display the html
                        $('#spidochetube_list').append(html);

                        // Update the page token tracker or hide the load more button
                        if(data.nextPageToken !== undefined){
                            // Update the page token
                            $('#spidochetube_loadmore').attr('data-next',next_page);
                        }else{
                            // Hide the loader
                            $('#spidochetube_loadmore').css('display','none');

                        }
                    }); //END $.each(data.items)

                } else {

                    $.each(data.items, function(index,item){

                        // inspect the item object to know all the information available
                        // console.log(item);

                        // Get the video information
                        var snippet = item.snippet;
                        var title = snippet.title;
                        var video_id  = "";
                        var thumb_url = "";
                        var video_url = "";

                        // Do not show video without thumbnail (no thumbnail === no available)
                        if(snippet.thumbnails !== undefined){
                            video_id  = item.id.videoId;
                            thumb_url = snippet.thumbnails.medium.url; // get medium quality thumb url
                            video_url = "https://www.youtube.com/embed/"+video_id;
                        }else{
                            return;
                        }

                        // Create the html
                        html  = '<li>';
                        html += '<a title="'+title+'" href="'+video_url+'" data-youtubeID="'+video_id+'">';
                        html += '<img src="'+thumb_url+'" alt="'+title+'" />';
                        html += (1 === parseInt(settings.title_show)) ? '<span>'+title+'</span>' : '';
                        html += (1 === parseInt(settings.desc_show) && 'dark' !== settings.theme) ? '<span class="wpgp-sct-desc">'+description+'</span>' : '';
                        html += '</a>';
                        html += '</li>';

                        // Display the html
                        $('#spidochetube_list').append(html);

                        // Update the page token tracker or hide the load more button
                        if(data.nextPageToken !== undefined){
                            // Update the page token
                            $('#spidochetube_loadmore').attr('data-next',next_page);
                        }else{
                            // Hide the loader
                            $('#spidochetube_loadmore').css('display','none');
                        }
                    }); //END $.each(data.items)
                }

            }).then(function(){

                // When the JSON request is complete
                // Initialize the first video
                if(first_load === true){

                    var first_video_id  = $('#spidochetube_list li:first-child a').attr('data-youtubeID');
                    var first_video_url = iframe_src(first_video_id, settings.autoplay, settings.theme);
                    var iframe_html     = '<iframe id="player" src="'+first_video_url+'" width="560" height="315" frameborder="0" allowfullscreen></iframe>';

                    $('#spidochetube_list li:first-child').addClass('spidochetube_current');

                    $('#spidochetube_player').append(iframe_html);
                }

                // Load more click event
                $('#spidochetube_loadmore').off('click').on('click',function(){
                    $this.spidochetube({
                        key         : settings.key,
                        id          : settings.id,
                        max_results : settings.max_results,
                        paging      : settings.paging,
                        first_load  : false
                    });
                    return false;
                });

                // Set player iframe height
                set_player_height();
                $(window).resize(set_player_height);

                // Create callback function when the feed is completly loaded
                if($.isFunction(settings.complete)){
                    settings.complete.apply($this);
                }

            }); // END getJSON

        });// END each()

        // Build and return the youtube iframe src
        function iframe_src(iframe_video_id, theme){

            var src = 'https://www.youtube.com/embed/'+iframe_video_id+'?version=3&loop=1&showsearch=0&showinfo=0&theme='+theme;
            return src;

        }

        // Keep player height ratio on resize
        function set_player_height() {

            var ratio = 1.777; // 16:9 aspect ratio
            var player_width = $('#player').width();
            var player_height = player_width / ratio;

            $('#player').height(player_height);

        }

        // Add delegate click event
        function init_item_click($el, scroll_duration) {

            // Update the video on click, scroll to the player and toggle the current class
            $el.on('click','li a',function(e){
                e.preventDefault();
                var next_video_id = $(this).attr('data-youtubeID');
                var next_video_url = iframe_src(next_video_id, settings.autoplay, settings.theme);

                $('#spidochetube_list li').removeClass('spidochetube_current');
                $(this).parent().addClass('spidochetube_current');

                $('html, body').animate({
                    scrollTop: $('#spidochetube_player').offset().top
                }, scroll_duration, function(){
                    $('#spidochetube_player iframe').attr('src' , next_video_url);
                });

            });
        }

    }; //END spidochetube

})(jQuery);
