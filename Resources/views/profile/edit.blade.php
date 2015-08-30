@layout( 'templates.layouts.sidebar-profile' )

{{--
Template Name: 用户资料
--}}



@section('page-content')



    @include('templates.content.page')

    @eval($city = get_user_city();$leftact['profile']='active';)

    <script type="text/javascript" src="/static/js/jquery.cityselect.js"></script>
    <div class="hide" id="city_select">
        <select class="prov" name="from[prov]" data-required="yes" data-type="select"></select>
        <select class="city" style="display: none;" name="from[city]" data-required="no" data-type="select" disabled="disabled"></select>
    </div>

    <script>
        var $ = $ || jQuery;
        var ele = $('li.wpuf-el.from .wpuf-fields');
        ele.empty().append($('#city_select').html());
        $('#city_select').empty();
        ele.citySelect({
            nodata: "none",
            @if($city)
            prov: "{{ $city['prov'] }}",
            city: "{{ $city['city'] }}",
            @endif
            required: true
        });
        //        jQuery('#address_cn').addClass('city_input  inputFocus proCityQueryAll proCitySelAll');
        //        jQuery(function ($) {
        //            $('select[name="from[]"]').change(function () {
        //                var $from = jQuery(this).val();
        //                //alert($from);
        //            });
        //        });

    </script>

@endsection

<?php
function get_user_city()
{
    if ($city = User::meta('from')) {
        $city = array_map('trim', explode('|', $city));
        $city = ['prov' => $city[0], 'city' => $city[1]];
    } else {
        $city = [];
    }
    return $city;
}

?>