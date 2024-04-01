{{-- <x-mail::message>
# Hello, Welcome {{$data['name']}}

<h3>Name: {{$data['name']}}</h3>
<h3>E-mail Address: {{$data['email']}}</h3>
<h3>Phone No: {{$data['phone']}}</h3>
<h3>Address: {{$data['address']}}</h3>
<h3>Message: {{$data['message']}}</h3>
<h3>File:</h3> --}}

   {{-- <img src="{{asset('storage/file/'. $data['file'])}}" width="300px"> --}}
   
{{-- <img src="{{ asset('images/1711016982.jpg') }}" width="300px">

<img src="{{ url('/images/1711016982.jpg') }}" width="300px">

<img src="{{ url('/images/1711016982.jpg') }}" width="300px"> --}}


{{-- <h3>Thank You For The Submitting Form</h3>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> --}}


<html>


<h3> Welcome {{ $data['name']}}</h3>
<h3>E-mail Address: {{$data['email']}}</h3>
<h3>Phone No: {{$data['phone']}}</h3>
<h3>Address: {{$data['address']}}</h3>
<h3>Message: {{$data['message']}}</h3>

<h3>file</h3>
{{-- <h3> Welcome {{ $name}}</h3> --}}
{{-- <img src="{{ $image_url }}" alt="Alternate Text"> --}}

</html>
