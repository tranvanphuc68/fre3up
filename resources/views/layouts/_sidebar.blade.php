@if (Auth::check())
    
    <div class="sidebar-menu" >
            <a href="{{ url('/quiz') }}" class="sidebar-item">
              <i class="fal fa-home sidebar-icon"></i>
              <span class="sidebar-text">Quiz</span>
              <span class="sidebar-status"></span>
            </a>

            <a href=" {{ url('/process')}}" class="sidebar-item">
              <i class="fal fa-calendar sidebar-icon"></i>
              <span class="sidebar-text">Work list</span>
              <span class="sidebar-status"></span>
            </a>

</div>
@endif