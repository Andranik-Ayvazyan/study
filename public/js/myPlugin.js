+function ($) {
    'use strict';

    var toggle = '[data-plugin="panel"]';

    var Panel   = function (el, options) {

        this.$element = $(el);

        this.body = $(el).find('.panel-body');

        this.pagination =  $(el).find('ul.pagination');

        this.options = options;

        this.isOpen = this.$element.hasClass('open');

        this.$toggleElement = this.$element.find('[data-toggle="panel.toggle"]');

        this.$toggleElement.on('click', this.toggle);

        this.init();

        this.bindPaginationEvent();

        this.url = options.content.ajax.url;

        this.data = {page:0};

        this.callback =  options.content.ajax.callback;

        this.currentPage = $(el).find('ul.pagination li');


    }

    Panel.DEFAULT = {};

    Panel.prototype.bindPaginationEvent = function (){

            var self = this;

            this.pagination.on('click','a',function(){

                  var pageNum = $(this).text();

                self.data = {page:pageNum};

                self.request(pageNum);

        })

    }

    Panel.prototype.init = function () {

        if (this.options.content){

            if(this.options.content.ajax){

                this.request(this.options.content.ajax);

            }
        }



    }


    Panel.prototype.drowPagination = function (response,object) {


        $(object.pagination).html("<li><a href='#' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>");

        var pagesCount = Math.ceil(response.total/4);

        for( i = 0;i < pagesCount; i++) {

            $(object.pagination).append("<li><a class = 'page-link'>"+(i+1)+"</a></li>")

        }

        $(object.pagination).append("<li><a href='#' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>");

    }

    Panel.prototype.request = function (params) {
        
        var self = this;
        
        $.ajax({

            url:this.url,
            data:self.data,
            callback:self.callback,

            success:function(response){

                if (self.callback) {

                    self.callback(response, self);

                }

                self.drowPagination(response,self);

                self.currentPage.eq(self.data-1).find('a').addClass('active');
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