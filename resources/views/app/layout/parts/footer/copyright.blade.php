{{--Build with &hearts; by Libern. <br>--}}
@foreach(\LaravelLocalization::getSupportedLocales() as $locale => $supportedLocale)
    <a href="{{ url('locales/switch/'.$locale.'?redirect_url='.current_full_url()) }}">{{ $supportedLocale['native'] }}</a> &nbsp;
@endforeach
<br>
Copyright © {{date('Y')}}&emsp;宁ICP备17001537号-1&emsp;宁夏深泉教育科技有限公司
