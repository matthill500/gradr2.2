@extends('layouts.appUser')

<link rel="stylesheet" href="{{ URL::asset('css/imageUpload.css') }}" />

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="card">
        <div class="card-header">
          My Profile
        </div>
        <div class="card-body">

          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <img src="{{asset('storage/img/'.$user->image)}}" height="250px" class="card-img-top" src="..." alt="No Profile Image" style="margin-bottom:1em;">

          <h2>Name</h2>
          <p>{{$user->name}}</p>
          <h3>Bio</h3>
          <p>{{$user->bio}}</p>

          @if($user->name === Auth::user()->name)

          <a href="{{ url('/user/editProfile') }}" class="btn btn-primary">Edit Profile</a>

          @endif

        </div>
      </div>
    </div>

    <div class="col-sm-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Activity
        </div>
        <div class="card-body">

          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <div class="card-body">
            @if ((count($questionsColleges) === 0) && (count($questionsCourses) === 0) && (count($questionsModules) === 0) && (count($questionsGenerals) === 0))
            <p> There are no questions </p>
            @else
            <table id="table-questions" class="table table-hover">
              <thead>
                <th>Title</th>
                  <th>Info</th>
                  <th>Category</th>
                  <th>Date Posted</th>
             </thead>
             <tbody>

               @foreach ($questionsColleges as $questionsCollege)

               @if($questionsCollege->student_id === $user->student->id)
               <tr data-id="{{$questionsCollege->id}}">
                 <td>{{ substr($questionsCollege->title,'0','20') }}</td>
                 <td>{{ substr($questionsCollege->info,'0','40') }}</td>
                 <td>{{ substr($questionsCollege->college->name,'0','40') }}</td>
                 <td>{{ $questionsCollege->created_at }}</td>
                 <td>
                   <a href="{{ route('user.questions.showCollege', $questionsCollege->id )}}" class="btn btn-primary">View</a>
                 </td>
               </tr>
            @endif

            @endforeach


            @foreach ($questionsCourses as $questionsCourse)

            @if($questionsCourse->student_id === $user->student->id)
            <tr data-id="{{$questionsCourse->id}}">
              <td>{{ substr($questionsCourse->title,'0','20') }}</td>
              <td>{{ substr($questionsCourse->info,'0','40') }}</td>
              <td>{{ substr($questionsCourse->course->course_name,'0','40') }}</td>
              <td>{{ $questionsCourse->created_at }}</td>
              <td>
                <a href="{{ route('user.questions.showCourse', $questionsCourse->id )}}" class="btn btn-primary">View</a>
              </td>
            </tr>
         @endif

         @endforeach


         @foreach ($questionsModules as $questionsModule)

         @if($questionsModule->student_id === $user->student->id)
         <tr data-id="{{$questionsModule->id}}">
           <td>{{ substr($questionsModule->title,'0','20') }}</td>
           <td>{{ substr($questionsModule->info,'0','40') }}</td>
           <td>{{ substr($questionsModule->module->module_name,'0','40') }}</td>
           <td>{{ $questionsModule->created_at }}</td>
           <td>
             <a href="{{ route('user.questions.showModule', $questionsModule->id )}}" class="btn btn-primary">View</a>
           </td>
         </tr>
      @endif

      @endforeach


      @foreach ($questionsGenerals as $questionsGeneral)

      @if($questionsGeneral->student_id === $user->student->id)
      <tr data-id="{{$questionsGeneral->id}}">
        <td>{{ substr($questionsGeneral->title,'0','20') }}</td>
        <td>{{ substr($questionsGeneral->info,'0','40') }}</td>
        <td>General</td>
        <td>{{ $questionsGeneral->created_at }}</td>

        <td>
          <a href="{{ route('user.questions.showGeneral', $questionsGeneral->id )}}" class="btn btn-primary">View</a>
        </td>
      </tr>
   @endif

   @endforeach

        @endif
           </tbody>
           </table>

          </div>

        </div>
      </div>
    </div>

</div>
@endsection
