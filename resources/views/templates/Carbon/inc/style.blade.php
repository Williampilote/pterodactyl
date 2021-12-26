@inject('Cache', 'Illuminate\Support\Facades\Cache')

<style>
  @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");
  
  @if($Cache::get('carbondarckmode' . Auth::user()->id) == 'on')
  
  :root {
      --header-height: 3rem;
      --nav-width: 75px;
      --first-color: @if(isset($settings['primary_color'])){{ $settings['primary_color'] }}@else #4723d9 @endif;
      --first-color-light: #ffffff;
      --main-background: #303030;
      --second-background: #262626;
      --text-color: #ffffff;
      --active-text-color:  #ffffff;
      --white-hover: #f4f5f7;
      --sidebar-bg-color: #262626;
      --sidebar-icon-color: #ffffff;
      --white-color: #ffffff;
      --body-font: 'Nunito', sans-serif;
      --normal-font-size: 1rem;
      --z-fixed: 100;
  }
  @else
  :root {
      --header-height: 3rem;
      --nav-width: 75px;
      --first-color: @if(isset($settings['primary_color'])){{ $settings['primary_color'] }}@else #4723d9 @endif;
      --first-color-light: #172b4d;
  
      --main-background: #f8f9fe;
      --second-background: #FFFF;
      --text-color: #172b4d;
      --active-text-color:#172b4d;
      --white-hover: #f4f5f7;
      --sidebar-bg-color: #FFFF;
      --sidebar-icon-color: white;
  
      --white-color: #ffffff;
      --body-font: 'Nunito', sans-serif;
      --normal-font-size: 1rem;
      --z-fixed: 100;
  }
  @endif
  
  @media (min-width: 640px){
  .cZTZeB {
      margin-top: 0.5rem !important;
      margin-bottom: 2.5rem;
  }}
  
  
  @media screen and (min-width: 75em){
  .evldyg {
      margin-left: 0  !important;
      margin-right: 0  !important;
  }}
  
  @media (min-width: 1024px){
  .iyAtmz {
      width: 100% !important;
      margin-top: 0px;
      padding-left: 0.6rem !important;
  }}
  
  .evldyg {
      max-width: 99.6% !important;
  }
  
  .ebtnLL, .cWFcHc, .cgXlJi, .RkKIC  {
      display: none;
  }
  
  .piqbQ {
    width: 100%;
    display: flex;
    justify-content: center;
    padding-bottom: 10px;
  }
  
  .powerbuttons-div {
    background: transparent;
    box-shadow: none;
  }
  
  
  
  .grusjm {
    padding: 0px !important;
  }
  
  .chartjs-render-monitor {
    height: 265px !important;
    width: 100% !important;
  }
  </style>