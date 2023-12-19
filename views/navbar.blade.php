<div class="top-0 bg-primary shadow-sm mb-4 d-flex justify-content-start align-items-center gap-4 text-white"
     style="padding: 15px 10px;">

    <button class="btn text-white text-white d-lg-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#sidebar"
            aria-controls="sidebar">
        <svg width="40px" height="40px" viewBox="-2.5 0 19 19" xmlns="http://www.w3.org/2000/svg" fill="#cccccc">
            <path
                    d="M.789 4.836a1.03 1.03 0 0 1 1.03-1.029h10.363a1.03 1.03 0 1 1 0 2.059H1.818A1.03 1.03 0 0 1 .79 4.836zm12.422 4.347a1.03 1.03 0 0 1-1.03 1.029H1.819a1.03 1.03 0 0 1 0-2.059h10.364a1.03 1.03 0 0 1 1.029 1.03zm0 4.345a1.03 1.03 0 0 1-1.03 1.03H1.819a1.03 1.03 0 1 1 0-2.059h10.364a1.03 1.03 0 0 1 1.029 1.03z"/>
        </svg>
    </button>
    <div class="d-flex flex-column flex-md-row">
        <div class="fs-3 fw-bolder">{{ $title ?? "Undefined" }}</div>
        <div wire:offline style="color: #c3c3c3">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                 viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path
                        d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
            </svg>
            There is no internet connection.
        </div>
    </div>
</div>
