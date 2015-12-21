//------- popover 提示框 -------
$(function () {
  $('[data-toggle="popover"]').popover()
})

//------- hover 菜单 -------
!function($) {
    var $allDropdowns = $();
    $.fn.exDropdown = function(option) {
        return this.each(function () {
            var defaults = {
                delay: 300,
                closeOthers: true
            };
            var $this = $(this);
            var $parent = $this.parent();
            var options = $.extend({}, defaults, $this.data(), option);
            var timeout;

            $allDropdowns = $allDropdowns.add($parent);

            $parent.hover(function() {
                if(options.closeOthers === true) {
                    $allDropdowns.removeClass('open');
                }
                window.clearTimeout(timeout);
                $parent.addClass('open');
            }, function() {
                timeout = window.setTimeout(function() {
                    $parent.removeClass('open');
                }, options.delay);
            });
        });
    };

    $(document).ready(function () {
        $('[data-hover=exDropdown]').exDropdown(null);
    });
}(jQuery);