@if(session('success') || session('error') || $errors->any())
    @php
        $type = session('success') ? 'success' : (session('error') || $errors->any() ? 'danger' : '');
        $message = session('success') ?? session('error');
    @endphp

    <div class="custom-alert alert hide {{ $type }}">
        <span class="fas fa-{{ $type === 'success' ? 'check-circle' : 'exclamation-circle' }}"></span>
        
        <span class="msg">
            @if ($errors->any())
                <ul style="margin-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @else
                {{ $message }}
            @endif
        </span>

        <div class="close-btn">
            <span class="fas fa-times"></span>
        </div>
    </div>
@endif
