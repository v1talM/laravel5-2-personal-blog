
/*

  Maria WordPress Theme
  Author: MyPreview LLC.

 */


/* ==============================================
 jQuery Instafeed
 =============================================== */
jQuery(function ($) {

    "use strict";

    var userFeed = new Instafeed({
        target: 'widgetInsta',
        limit: instagram_keys_widget.limit,
        get: 'tagged',
        resolution: 'thumbnail',
        tagName: instagram_keys_widget.tag_name,
        accessToken: instagram_keys_widget.access_token,
        sortBy: 'random',
        template: '<a target="_blank" href="{{link}}" title="{{caption}}"><img src="{{image}}" /></a>'
    });
    userFeed.run();
});