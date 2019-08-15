<?php // Global Options
$phone = get_field('phone', 'option');
$email = get_field('email', 'option');
$facebook = get_field('facebook_url', 'option');
$twitter = get_field('twitter_url', 'option');
$youtube = get_field('youtube_url', 'option');
$linkedin = get_field('linkedin_url', 'option');
$instagram = get_field('instagram_url', 'option');
?>


<footer id="footer">
  <div id="footer-upper">
    <div class="container">
      <div class="row">
      
        <div class="col-sm-6 col-md-3">
          <?php wp_nav_menu( array( 'theme_location' => 'footer-nav', 'container' => false, 'menu_id' => 'footer-nav', 'menu_class' => 'menu clearfix', 'depth' => 1 ) ); ?>
          
          <?php // ACF global options: Contact Info ?>
          <ul class="footer-contact">
         		<?php if ($phone) { ?>
              <li> <i class="fas fa-phone"></i> <?= $phone ?></li>
            <?php } ?>
          	
						<?php if ($email) { ?>
              <li><a href="mailto:<?= $email ?>" target="_blank"><i class="fas fa-envelope"></i> <?= $email ?></a></li>
            <?php } ?>
          </ul>
          
          <?php // ACF global options: Social Icons ?>
          <ul class="social-links">
            <?php if ($facebook) { ?>
              <li class="facebook"> <a href="<?= $facebook ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            <?php } ?>
           
           	<?php if ($twitter) { ?>
              <li class="twitter"> <a href="<?= $twitter ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <?php } ?>
            
            <?php if ($youtube) { ?>
              <li class="youtube"> <a href="<?= $youtube ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
            <?php } ?>
            
            <?php if ($linkedin) { ?>
              <li class="linkedin"> <a href="<?= $linkedin ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
            <?php } ?>

            <?php if ($instagram) { ?>
              <li class="instagram"><a href="<?= $instagram ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <?php } ?>
          </ul>
        </div> <!-- /col -->

        <div class="col-sm-6 col-md-3">
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2') ) : ?>
          <?php endif; ?>
        </div> <!-- /col -->

        <div class="col-sm-6 col-md-3">
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-3') ) : ?>
          <?php endif; ?>
        </div> <!-- /col -->

        <div class="col-sm-6 col-md-3">
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-4') ) : ?>
          <?php endif; ?>
        </div> <!-- /col -->

      </div> <!-- /row -->
    </div><!-- /container -->
  </div> <!-- /footer-upper -->

  <div id="sub-floor">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          Boiler theme by <a target="_blank" href="https://dd9.com">DD9</a> - <a href="/assets">Assets</a> - <a href="/wp-admin">Admin Login</a> -  &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>  <a class="site-credit" title="Website Design and Development by DD9.com" target="_blank" href="http://dd9.com">Website by DD9</a>
        </div> <!-- /col -->
      </div> <!-- /row -->
    </div> <!-- /container -->
  </div> <!-- /sub-floor -->

</footer> <!-- /footer -->

<?php  #all js scripts are loaded in library/bones.php ?>


<script>
  
  /**
 *
 * Responsive Background Images
 *
 * By Alberto Silva
 * https://github.com/asilgag
 *
 * Based on https://github.com/webatvantage/Responsive-Background-Images
 *
 * This is free and unencumbered software released into the public domain.
 *
 * Anyone is free to copy, modify, publish, use, compile, sell, or
 * distribute this software, either in source code form or as a compiled
 * binary, for any purpose, commercial or non-commercial, and by any
 * means.
 *
 * In jurisdictions that recognize copyright laws, the author or authors
 * of this software dedicate any and all copyright interest in the
 * software to the public domain. We make this dedication for the benefit
 * of the public at large and to the detriment of our heirs and
 * successors. We intend this dedication to be an overt act of
 * relinquishment in perpetuity of all present and future rights to this
 * software under copyright law.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS BE LIABLE FOR ANY CLAIM, DAMAGES OR
 * OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
 * ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 *
 * For more information, please refer to <http://unlicense.org>
 */

(function(root, factory) {
  if (typeof define === 'function' && define.amd) {
    define([], factory(root));
  } else if (typeof exports === 'object') {
    module.exports = factory(root);
  } else {
    root.ResponsiveBackgroundImages = factory(root);
  }
})(this, function(root) {

  'use strict';

  //
  // Variables
  //
  var ResponsiveBackgroundImages = {}; // Object for public APIs
  var settings = {
    selector: 'background-image-srcset',
    interval: 250
  };
  var loadedUrls = []; // Already loaded images


  //
  // Methods
  //

  /**
   * A simple forEach() implementation for Arrays, Objects and NodeLists
   * @private
   * @param {Array|Object|NodeList} collection - Collection of items to iterate
   * @param {Function} callback - Callback function for each iteration
   * @param {Array|Object|NodeList} scope - Object/NodeList/Array that forEach is iterating over (aka `this`)
   */
  var forEach = function(collection, callback, scope) {
    if (Object.prototype.toString.call(collection) === '[object Object]') {
      for (var prop in collection) {
        if (Object.prototype.hasOwnProperty.call(collection, prop)) {
          callback.call(scope, collection[prop], prop, collection);
        }
      }
    } else {
      for (var i = 0, len = collection.length; i < len; i++) {
        callback.call(scope, collection[i], i, collection);
      }
    }
  };

  /**
   * Merge settings with user options
   * @private
   * @param {Object} settings - Default settings
   * @param {Object} options - User options
   * @returns {Object} Merged values of defaults and options
   */
  var extend = function(settings, options) {
    var extended = {};
    forEach(settings, function(value, prop) {
      extended[prop] = settings[prop];
    });
    forEach(options, function(value, prop) {
      extended[prop] = options[prop];
    });
    return extended;
  };


  /**
   * Returns a function, that, as long as it continues to be invoked, will not
   * be triggered. The function will be called after it stops being called for
   * N milliseconds. If `immediate` is passed, trigger the function on the
   * leading edge, instead of the trailing.
   * @private
   * @param {Function} func - The function that will be called after it stops being called for N milliseconds
   * @param {Number} wait - Interval in milliseconds
   * @param {Boolean} immediate - trigger the function on the leading edge, instead of the trailing
   * @returns {Function}
   * @usage - http://underscorejs.org/#debounce
   */
  var debounce = function(func, wait, immediate) {

    var timeout, args, context, timestamp, result;
    var later = function() {
      var now = new Date().getTime();
      var last = now - timestamp;

      if (last < wait && last >= 0) {
        timeout = setTimeout(later, wait - last);
      } else {
        timeout = null;
        if (!immediate) {
          result = func.apply(context, args);
          if (!timeout) context = args = null;
        }
      }
    };

    return function() {
      context = this;
      args = arguments;
      timestamp = new Date().getTime();
      var callNow = immediate && !timeout;
      if (!timeout) timeout = setTimeout(later, wait);
      if (callNow) {
        result = func.apply(context, args);
        context = args = null;
      }

      return result;
    };
  };


  //
  // Public APIs
  //

  /**
   * Sets background image based on breakpoint
   * @public
   */
  ResponsiveBackgroundImages.run = function(options) {

    settings = extend(settings, options || {});

    // Define local variables
    var itemsWithBackground = document.querySelectorAll('[data-' + settings.selector + ']');
    var el;
    var elSrcSetRawData;
    var elWidth;

    // Loop through all target elements
    for (var i = 0, len = itemsWithBackground.length; i < len; i++) {

      // Set current variables
      var elSrcSet = [];
      el = itemsWithBackground[i];
      elSrcSetRawData = el.getAttribute('data-' + settings.selector);
      elWidth = el.offsetWidth * window.devicePixelRatio || 1;

      // Parse srcset definitions into an array
      elSrcSet = ResponsiveBackgroundImages.parseSrcSet(elSrcSetRawData);

      if (elSrcSet.length > 0) {
        for (var x = 0, xLen = elSrcSet.length; x < xLen; x++) {
          // Find images bigger than element width, or fallback to the biggest one
          if (elSrcSet[x].width >= elWidth || x === xLen - 1) {
            // Lookup for an already loaded bigger image, unless it is forced
            var alreadyLoadedBiggerImage = null;
            if (!elSrcSet[x].force) {
              alreadyLoadedBiggerImage = ResponsiveBackgroundImages.findAlreadyLoadedBiggerImage(
                elSrcSet,
                elWidth
              );
            }

            var srcToLoad = (alreadyLoadedBiggerImage) ? alreadyLoadedBiggerImage : elSrcSet[x].src;
            el.style.backgroundImage = "url('" + srcToLoad + "')";
            if (loadedUrls.indexOf(srcToLoad) === -1) {
              loadedUrls.push(srcToLoad);
            }
            break;
          }
        }
      }
    }
  };


  /**
   * Parse srcSet data and returns an ordered array
   * @private
   * @param {String} srcSetRawData - The content of the data attribute in settings.selector
   * @returns {Array}
   */
  ResponsiveBackgroundImages.parseSrcSet = function(srcSetRawData) {
    var srcSet = [];
    if (srcSetRawData !== null && srcSetRawData.length > 0) {
      var srcSetLines = srcSetRawData.split(',');
      for (var j = 0, jLen = srcSetLines.length; j < jLen; j++) {
        var srcSetLineParts = srcSetLines[j].match(/(\S+)\s+(\d+)w(\s+force)?/);
        srcSet.push({
          'src': srcSetLineParts[1],
          'width': srcSetLineParts[2],
          'force': !!srcSetLineParts[3]
        });
      }

      // Sort by width
      srcSet.sort(function(a, b) {
        return a.width - b.width;
      });
    }

    return srcSet;
  };


  /**
   * Find an already loaded image for this srcSet
   * @private
   * @param {Array} srcSet - All the available images for this srcSet, in an array
   * @param {Number} minWidth - Min width to look for
   * @returns {String|Null}
   */
  ResponsiveBackgroundImages.findAlreadyLoadedBiggerImage = function(srcSet, minWidth) {
    // srcSet is ordered by width.
    // Reverse it to get bigger images first
    var srcSetReverse = srcSet.slice(0).reverse();

    for (var i = 0, len = srcSetReverse.length; i < len; i++) {
      // Take width into account to return a match,
      // but also return it if it's the biggest image in set (i === 0)
      if (loadedUrls.indexOf(srcSetReverse[i].src) !== -1 &&
        (srcSetReverse[i].width >= minWidth || i === 0)) {
        return srcSetReverse[i].src;
      }
    }
    return null;
  };


  /**
   * Add resize event
   * @public
   * @returns {String}
   */
  ResponsiveBackgroundImages.addResizeEvent = function() {
    window.addEventListener('resize', debounce(ResponsiveBackgroundImages.run , settings.interval));
  };

  // Auto initialize
  ResponsiveBackgroundImages.run();
  ResponsiveBackgroundImages.addResizeEvent();

  // Return the object
  return ResponsiveBackgroundImages;
});

</script>
<?php wp_footer(); ?>
    
</body>
</html>