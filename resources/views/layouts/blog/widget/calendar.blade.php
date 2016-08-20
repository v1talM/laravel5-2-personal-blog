@inject('calendar','App\Repositories\Presenter\CalendarPresenter')
<div id="calendar-2" class="widget widget_calendar"><h3 class="widget-title"><span
                class="widget-title-line"></span><span class="widget-title-text">Calendar</span></h3>
    <div id="calendar_wrap" class="calendar_wrap">
        {!! $calendar->getCalendar() !!}
    </div>
</div>