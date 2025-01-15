<div>
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div>
                    <div id='calendar-container' wire:ignore>
                        <div id='calendar'></div>
                        <div wire:ignore id='calendar'></div>
                    </div>
                </div>
                @push('scripts')
                    {{-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script> --}}
                    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
                    
                    <script>
                        // document.addEventListener('livewire:load', function() {
                        document.addEventListener('livewire:initialized', function() {
                            var Calendar = FullCalendar.Calendar;
                            var Draggable = FullCalendar.Draggable;
                            var calendarEl = document.getElementById('calendar');
                            var checkbox = document.getElementById('drop-remove');
                            var data =   @this.events;
                        
                            var addEventTitle = "{{ trans('subjects_trans.Enter_event_title') }}";
                            var eventAddedSuccess = "{{ trans('subjects_trans.Event_added_successfully') }}"; 
                            var enterEventTitle = "{{ trans('subjects_trans.Please_enter_the_event_title') }}"; 
                        
                            var calendar = new Calendar(calendarEl, {
                                events: JSON.parse(data), 
                                dateClick(info) {
                                    var title = prompt(addEventTitle);
                                    var date = new Date(info.dateStr + 'T00:00:00');
                                    if(title != null && title != ''){
                                        calendar.addEvent({
                                            title: title,
                                            start: date,
                                            allDay: true
                                        });
                                        var eventAdd = {title: title,start: date};
                                    @this.addevent(eventAdd);
                                        alert(eventAddedSuccess);
                                    }
                                    else{
                                        alert(enterEventTitle);
                                    }
                                },
                                editable: true,
                                selectable: true,
                                displayEventTime: false,
                                droppable: true, // this allows things to be dropped onto the calendar
                                drop: function(info) {
                                    // is the "remove after drop" checkbox checked?
                                    if (checkbox.checked) {
                                        // if so, remove the element from the "Draggable Events" list
                                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                                    }
                                },
                                eventDrop: info => @this.eventDrop(info.event, info.oldEvent),
                                loading: function(isLoading) {
                                    if (!isLoading) {
                                        // Reset custom events
                                        this.getEvents().forEach(function(e){
                                            if (e.source === null) {
                                                e.remove();
                                            }
                                        });
                                    }
                                }
                            });
                            calendar.render();
                        @this.on(`refreshCalendar`, () => {
                            calendar.refetchEvents()
                        });
                        });
                    </script>
                    {{-- <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />  --}}
                    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.css' rel='stylesheet' />  
                @endpush <br>
            </div>
        </div>
    </div>
</div>