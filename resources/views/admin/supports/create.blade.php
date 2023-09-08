<h1>Criar dúvida</h1>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif

<form action="{{ route('supports.store') }}" method="POST">
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
    @csrf()
    <input type="text" name="subject" placeholder="Assunto" value="{{ old('subject') }}">
    <textarea name="body" placeholder="Descrição" cols="30" rows="5">{{ old('body') }}</textarea>
    <button type="submit">Enviar</button>
</form>
