@include('customer_include.header_start')
@include('customer_include.common_css')

@yield('pageSpecificStyles') <!-- your custom styles goes here -->

@include('customer_include.header_end')

@include('customer_include.top_bar')


@yield('pageSpecificContent') <!-- Page content goes here -->

@include('customer_include.common_script')

@yield('pageSpecificScript') <!-- your custom scripts goes here -->

