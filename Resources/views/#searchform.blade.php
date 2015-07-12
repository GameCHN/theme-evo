<form role="search" method="get" class="search-form form-inline" action="{{ esc_url(home_url('/')) }}">
    <label class="sr-only">{{ _e('Search for:', 'cutlass') }}</label>

    <div class="input-group">
        <input type="search" value="{{ get_search_query() }}" name="s" class="search-field form-control" placeholder="{{ _e('Search', 'cutlass') }} {{ bloginfo('name') }}">
    <span class="input-group-btn">
      <button type="submit" class="search-submit btn btn-default">{{ _e('Search', 'cutlass') }}</button>
    </span>
    </div>
</form>
