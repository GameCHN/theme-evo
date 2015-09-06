<!DOCTYPE HTML>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" {{ language_attributes() }} id="ie6"> <![endif]--><!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" {{ language_attributes() }} id="ie7"> <![endif]--><!--[if IE 8]>
<html class="no-js lt-ie9" {{ language_attributes() }} id="ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" {{ language_attributes() }}>
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <base href="/" target="_top">
    <title>@section('title'){{ wp_title(' | ', true, 'right') }} - {{ get_bloginfo( 'description', __('对接涉外律师服务')  ) }}@show</title>
    <meta name="keywords" content="{{ of_get_option('metakeywords') }}" />
    <meta name="description" content="{{ of_get_option('metadescription') }}" />
    @section('head-top')
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
    @show
    {{ wp_head() }}

    @static('vendor/bootstrap/dist/css/bootstrap.min.css')
    @static('css/bootstrap-theme.css')
    @static('css/style.css')
    @static('vendor/prettyphoto/css/prettyPhoto.css')
    @static('vendor/owl-carousel/css/owl.carousel.css')
    @static('vendor/owl-carousel/css/owl.theme.css')
    <!--[if lte IE 9]>@static('css/ie.css')<![endif]-->
    @static('css/custom.css')
    @static('colors/color1.css')
    @static('locale/__LANG__.css')
    @static('js/modernizr.js')
    @static('js/app.js')
    {{ Asset::styles() }}
    {{ Asset::scripts() }}
    <link rel="alternate" type="application/rss+xml" title="{{ get_bloginfo('name') }} Feed"
          href="{{ esc_url(get_feed_link()) }}">
    @section('head-add')
    @show
</head>
@section('body')
@show