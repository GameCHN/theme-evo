@layout( 'templates.layouts.sidebar-profile' )

{{--
Template Name: 注册页
--}}

@section('page-content')

    @include('templates.content.page')
    <script type="text/javascript" src="/static/js/jquery.cityselect.js"></script>
    <div class="hide" id="city_select">
        <select class="prov" name="from[prov]" data-required="yes" data-type="select"></select>
        <select class="city" name="from[city]" data-required="no" data-type="select" disabled="disabled"></select>
    </div>

    <script>
        var $ = $ || jQuery;
        var ele=$('li.wpuf-el.from .wpuf-fields');
        ele.empty().append($('#city_select').html());
        ele.citySelect({nodata:"none",required:false});
//        jQuery('#address_cn').addClass('city_input  inputFocus proCityQueryAll proCitySelAll');
//        jQuery(function ($) {
//            $('select[name="from[]"]').change(function () {
//                var $from = jQuery(this).val();
//                //alert($from);
//            });
//        });

    </script>

@endsection
