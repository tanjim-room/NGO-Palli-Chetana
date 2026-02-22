@extends('main')

@push('css')
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.2.0/main.min.css'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@4.3.0/main.min.css'>
    <style>
    .pc-calendar-wrapper {
        position: relative;
        background: linear-gradient(135deg, rgba(22,163,74,0.05), rgba(14,165,233,0.05));
        border-radius: 1rem;
        padding: 1.5rem;
    }
    #calendar {
        max-width: 100%;
        margin: 0 auto;
        background: #fff;
        padding: 20px;
        border-radius: 0.75rem;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    }
    .fc-event {
        border: 1px solid rgba(255,255,255,0.2) !important;
        border-radius: 4px !important;
        cursor: pointer;
    }
    .fc-content {
        padding: 3px !important;
    }
    .fc-content .fc-title {
        display: block !important;
        overflow: hidden;
        text-align: center;
        font-size: 12px;
        font-weight: 500;
    }
    .fc-customButton-button {
        font-size: 13px !important;
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateY(-50%);
    }
    .fc-button-primary {
        background-color: var(--pc-primary) !important;
        border-color: var(--pc-primary) !important;
    }
    .fc-button-primary:hover {
        background-color: #15803d !important;
        border-color: #15803d !important;
    }
    .fc-today-button {
        background-color: var(--pc-secondary) !important;
        border-color: var(--pc-secondary) !important;
    }
    .fc-day-today {
        background-color: rgba(22,163,74,0.05) !important;
    }
    .form-group {
        margin-bottom: 1rem;
    }
    .form-group > label {
        margin-bottom: 8px;
        font-weight: 500;
    }
    #delete-modal .modal-footer > .btn {
        border-radius: 6px !important;
        padding: 6px 16px !important;
        font-size: 14px;
    }
    .fc-scroller {
        overflow-y: hidden !important;
    }
    .context-menu {
        position: absolute;
        z-index: 1000;
        background-color: #fff;
        border: none;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        padding: 6px;
        min-width: 150px;
    }
    .context-menu ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }
    .context-menu ul > li {
        display: block;
        padding: 8px 16px;
        color: #333;
        cursor: pointer;
        border-radius: 6px;
        transition: all 0.15s;
        font-size: 13px;
    }
    .context-menu ul > li:hover {
        color: #fff;
        background-color: var(--pc-primary);
    }
    .context-menu ul > li i {
        font-size: 13px;
        margin-right: 6px;
    }
    </style>
@endpush

@section('content')

<!-- ====== Page Header ====== -->
<section class="pc-page-header" style="background-image: url('{{ asset('frontend/img/page-header-bg.jpg') }}');">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Events Calendar</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item text-white-50">News & Events</li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Calendar</li>
            </ol>
        </nav>
    </div>
</section>

<!-- ====== Calendar Section ====== -->
<section class="pc-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge"><i class="bi bi-calendar-event me-1"></i> Events</span>
            <h2 class="pc-section-title mt-3">Events Calendar</h2>
            <p class="text-muted mx-auto" style="max-width:600px;">View the names, dates, and durations of our upcoming events and programs from this calendar.</p>
        </div>

        <div data-aos="fade-up" data-aos-delay="100">
            <div class="pc-calendar-wrapper">
                <div id='calendar'></div>

                <!-- Add/Edit Modal -->
                <div class="modal fade edit-form" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content border-0 shadow-lg rounded-4">
                            <div class="modal-header border-0 pb-0 px-4 pt-4">
                                <h5 class="modal-title fw-bold" id="modal-title">
                                    <i class="bi bi-calendar-plus me-2" style="color:var(--pc-primary);"></i>Add Event
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="myForm">
                                <div class="modal-body px-4 py-3">
                                    <div class="alert alert-danger border-0 rounded-3" role="alert" id="danger-alert" style="display: none;">
                                        <i class="bi bi-exclamation-triangle me-2"></i>End date should be greater than start date.
                                    </div>
                                    <div class="form-group">
                                        <label for="event-title" class="form-label">Event name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control rounded-3" id="event-title" placeholder="Enter event name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="start-date" class="form-label">Start date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control rounded-3" id="start-date" placeholder="start-date" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="end-date" class="form-label">End date <small class="text-muted">— Optional</small></label>
                                        <input type="date" class="form-control rounded-3" id="end-date" placeholder="end-date">
                                    </div>
                                    <div class="form-group">
                                        <label for="event-color" class="form-label">Color</label>
                                        <input type="color" class="form-control form-control-color rounded-3" id="event-color" value="#16a34a">
                                    </div>
                                </div>
                                <div class="modal-footer border-0 px-4 pb-4 pt-0 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-pc-primary px-4 py-2 rounded-3" id="submit-button">
                                        <i class="bi bi-plus-circle me-1"></i> Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="delete-modal-title" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content border-0 shadow-lg rounded-4">
                            <div class="modal-header border-0 px-4 pt-4 pb-0">
                                <h5 class="modal-title fw-bold" id="delete-modal-title">
                                    <i class="bi bi-trash3 me-2 text-danger"></i>Confirm Deletion
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center px-4 py-4" id="delete-modal-body">
                                Are you sure you want to delete the event?
                            </div>
                            <div class="modal-footer border-0 px-4 pb-4 pt-0 justify-content-center">
                                <button type="button" class="btn btn-light px-4 rounded-3" data-dismiss="modal" id="cancel-button">Cancel</button>
                                <button type="button" class="btn btn-danger px-4 rounded-3" id="delete-button">
                                    <i class="bi bi-trash3 me-1"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('js')
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.2.0/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@4.2.0/main.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@4.2.0/main.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/uuid@8.3.2/dist/umd/uuidv4.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
  const calendarEl = document.getElementById('calendar');
  const myModal = new bootstrap.Modal(document.getElementById('form'));
  const dangerAlert = document.getElementById('danger-alert');
  const close = document.querySelector('.btn-close');




const myEvents = JSON.parse(localStorage.getItem('events')) || [
    {
      id: uuidv4(),
      title: `Edit Me`,
      start: '2023-04-11',
      backgroundColor: 'red',
      allDay: false,
      editable: false,
    },
    {
      id: uuidv4(),
      title: `Delete me`,
      start: '2023-04-17',
      end: '2023-04-21',

      allDay: false,
      editable: false,
    },
  ];


  const calendar = new FullCalendar.Calendar(calendarEl, {
    customButtons: {
      customButton: {
        text: 'Add Event',
        click: function () {
          myModal.show();
          const modalTitle = document.getElementById('modal-title');
          const submitButton = document.getElementById('submit-button');
          modalTitle.innerHTML = '<i class="bi bi-calendar-plus me-2" style="color:var(--pc-primary);"></i>Add Event'
          submitButton.innerHTML = '<i class="bi bi-plus-circle me-1"></i> Add Event'
          submitButton.classList.remove('btn-primary');
          submitButton.classList.add('btn-pc-primary');



          close.addEventListener('click', () => {
            myModal.hide()
          })



        }
      }
    },
    header: {
    //   center: 'customButton', // add your custom button here
      right: 'today, prev,next '
    },
    plugins: ['dayGrid', 'interaction'],
    allDay: false,
    editable: true,
    selectable: true,
    unselectAuto: false,
    displayEventTime: false,
    events: myEvents,
    eventRender: function(info) {
      info.el.addEventListener('contextmenu', function(e) {
        e.preventDefault();
        let existingMenu = document.querySelector('.context-menu');
        existingMenu && existingMenu.remove();
        let menu = document.createElement('div');
        menu.className = 'context-menu';
        menu.innerHTML = `<ul>
        <li><i class="bi bi-pencil-square"></i>Edit</li>
        <li><i class="bi bi-trash3"></i>Delete</li>
        </ul>`;

        const eventIndex = myEvents.findIndex(event => event.id === info.event.id);


        document.body.appendChild(menu);
        menu.style.top = e.pageY + 'px';
        menu.style.left = e.pageX + 'px';

        // Edit context menu

        menu.querySelector('li:first-child').addEventListener('click', function() {
          menu.remove();

          const editModal = new bootstrap.Modal(document.getElementById('form'));
          const modalTitle = document.getElementById('modal-title');
          const titleInput = document.getElementById('event-title');
          const startDateInput = document.getElementById('start-date');
          const endDateInput = document.getElementById('end-date');
          const colorInput = document.getElementById('event-color');
          const submitButton = document.getElementById('submit-button');
          const cancelButton = document.getElementById('cancel-button');
          modalTitle.innerHTML = '<i class="bi bi-pencil-square me-2" style="color:var(--pc-secondary);"></i>Edit Event';
          titleInput.value = info.event.title;
          startDateInput.value = moment(info.event.start).format('YYYY-MM-DD');
          endDateInput.value = moment(info.event.end, 'YYYY-MM-DD').subtract(1, 'day').format('YYYY-MM-DD');
          colorInput.value = info.event.backgroundColor;
          submitButton.innerHTML = '<i class="bi bi-check-circle me-1"></i> Save Changes';





          editModal.show();

          submitButton.classList.remove('btn-pc-primary')
          submitButton.classList.add('btn-primary')

          // Edit button

          submitButton.addEventListener('click', function() {
            const updatedEvents = {
              id: info.event.id,
              title: titleInput.value,
              start: startDateInput.value,
              end: moment(endDateInput.value, 'YYYY-MM-DD').add(1, 'day').format('YYYY-MM-DD'),
              backgroundColor: colorInput.value
            }

            if ( updatedEvents.end <= updatedEvents.start) { // add if statement to check end date
              dangerAlert.style.display = 'block';
              return;
            }

            const eventIndex = myEvents.findIndex(event => event.id === updatedEvents.id);
            myEvents.splice(eventIndex, 1, updatedEvents);

            localStorage.setItem('events', JSON.stringify(myEvents));

            // Update the event in the calendar
            const calendarEvent = calendar.getEventById(info.event.id);
            calendarEvent.setProp('title', updatedEvents.title);
            calendarEvent.setStart(updatedEvents.start);
            calendarEvent.setEnd(updatedEvents.end);
            calendarEvent.setProp('backgroundColor', updatedEvents.backgroundColor);
            editModal.hide();

          })



        });

        // Delete menu
        menu.querySelector('li:last-child').addEventListener('click', function() {
          const deleteModal = new bootstrap.Modal(document.getElementById('delete-modal'));
          const modalBody = document.getElementById('delete-modal-body');
          const cancelModal = document.getElementById('cancel-button');
          modalBody.innerHTML = `Are you sure you want to delete <b>"${info.event.title}"</b>?`
          deleteModal.show();

          const deleteButton = document.getElementById('delete-button');
          deleteButton.addEventListener('click', function () {
            myEvents.splice(eventIndex, 1);
            localStorage.setItem('events', JSON.stringify(myEvents));
            calendar.getEventById(info.event.id).remove();
            deleteModal.hide();
            menu.remove();

          });

          cancelModal.addEventListener('click', function () {
            deleteModal.hide();
          })




        });
        document.addEventListener('click', function() {
          menu.remove();
        });
      });
    },

    eventDrop: function(info) {
      let myEvents = JSON.parse(localStorage.getItem('events')) || [];
      const eventIndex = myEvents.findIndex(event => event.id === info.event.id);
      const updatedEvent = {
        ...myEvents[eventIndex],
        id: info.event.id,
        title: info.event.title,
        start: moment(info.event.start).format('YYYY-MM-DD'),
        end: moment(info.event.end).format('YYYY-MM-DD'),
        backgroundColor: info.event.backgroundColor
      };
      myEvents.splice(eventIndex, 1, updatedEvent); // Replace old event data with updated event data
      localStorage.setItem('events', JSON.stringify(myEvents));
      console.log(updatedEvent);
    }

  });

  calendar.on('select', function(info) {

    const startDateInput = document.getElementById('start-date');
    const endDateInput = document.getElementById('end-date');
    startDateInput.value = info.startStr;
    const endDate = moment(info.endStr, 'YYYY-MM-DD').subtract(1, 'day').format('YYYY-MM-DD');
    endDateInput.value = endDate;
    if(startDateInput.value === endDate) {
      endDateInput.value = '';
    }
  });


  calendar.render();

  const form = document.querySelector('form');

  form.addEventListener('submit', function(event) {
    event.preventDefault(); // prevent default form submission

    // retrieve the form input values
    const title = document.querySelector('#event-title').value;
    const startDate = document.querySelector('#start-date').value;
    const endDate = document.querySelector('#end-date').value;
    const color = document.querySelector('#event-color').value;
    const endDateFormatted = moment(endDate, 'YYYY-MM-DD').add(1, 'day').format('YYYY-MM-DD');
    const eventId = uuidv4();

    console.log(eventId);

    if (endDateFormatted <= startDate) { // add if statement to check end date
      dangerAlert.style.display = 'block';
      return;
    }

    const newEvent = {
      id: eventId,
      title: title,
      start: startDate,
      end: endDateFormatted,
      allDay: false,
      backgroundColor: color
    };

    // add the new event to the myEvents array
    myEvents.push(newEvent);

    // render the new event on the calendar
    calendar.addEvent(newEvent);

    // save events to local storage
    localStorage.setItem('events', JSON.stringify(myEvents));

    myModal.hide();
    form.reset();
  });

  myModal._element.addEventListener('hide.bs.modal', function () {
    dangerAlert.style.display = 'none';
    form.reset();
  });

});
    </script>
@endpush
