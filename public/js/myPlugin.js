+function ($) {
    'use strict';

    var toggle = '[data-plugin="panel"]';

    var Panel   = function (el, options) {

        this.$element = $(el);

        this.options = options;

        this.isOpen = this.$element.hasClass('open');

        this.$toggleElement = this.$element.find('[data-toggle="panel.toggle"]');

        this.$toggleElement.on('click', this.toggle);
        // $(el).on('click', dismiss, this.close)

        this.init();

    }

    Panel.DEFAULT = {};

    Panel.prototype.init = function () {

        if (this.options.content){
            if(this.options.content.ajax){

                this.request(this.options.content.ajax);

            }
        }
    }

    Panel.prototype.request = function (params) {
        $.ajax({

            url:params.url,
            data:params.data,
            success:function(){
                debugger;
            }

        })
    }

    Panel.prototype.toggle = function (e) {

        var $toggleElement = $(this).find('i');

        var elemClass = $toggleElement.attr('class');


        if(elemClass.match('down')) {

            $toggleElement.removeClass('fa-chevron-down').addClass('fa fa-chevron-up');

        } else {

            $toggleElement.removeClass('fa-chevron-up').addClass('fa fa-chevron-down');

        }



        $(this).closest(toggle).find('.panel-content').animate({

            height:'toggle'

        },700);

        // $(this).closest(toggle).toggleClass('open')
        //     .find('.panel-content').show().toggleClass('in');
    }

    function Plugin(option) {

        return this.each(function () {

            var $this = $(this)
            var data  = $this.data('my.panel')
            var options = $.extend({}, Panel.DEFAULTS, $this.data(), typeof option == 'object' && option)
            
            if (!data) $this.data('my.panel', (data = new Panel(this, options)))

            if (typeof option == 'string') data[option].call($this)

        })
    }
    

    $.fn.panelWidget             = Plugin
    $.fn.panelWidget.Constructor = Panel


    // ALERT DATA-API
    // ==============

    // $(document).on('click.bs.alert.data-api', dismiss, Alert.prototype.close)

}(jQuery);