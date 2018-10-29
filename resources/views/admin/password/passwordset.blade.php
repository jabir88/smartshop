@extends('admin.adminmaster')
@section('myContent')

<div id="page-wrapper">
    <div class="row">
      <div class="col-md-6 ">
                <div class=" panel panel-default" style="margin : 50px 0 0 0">
                    <div class="panel-heading">
                        <h3 class="panel-title">Change Password</h3>
                    </div>
                    @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif
                    @if (session('error'))
                      <div class="alert alert-danger">
                          {{ session('error') }}
                      </div>
                  @endif
                    <div class="panel-body">
                      {{ Form::open(['route' => 'password.set.submit', 'method' => 'post']) }}

                            <fieldset>

                                <div class="form-group">
                                  {{ Form::label('new_pass', 'New Password') }}
                                  {{ Form::password('new_pass', ['class' => 'form-control' ,'placeholder' => 'New Password']) }}
                                  @if ($errors->has('new_pass'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('new_pass') }}</strong>
                                      </span>
                                  @endif
                                </div>
                                <div class="form-group">
                                  {{ Form::label('retype_pass', 'Re-type Password') }}
                                  {{ Form::password('retype_pass', ['class' => 'form-control' ,'placeholder' => 'Re-type Password']) }}
                                  @if ($errors->has('retype_pass'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('retype_pass') }}</strong>
                                      </span>
                                  @endif
                                </div>
                          {{ Form::submit('Set Password' , ['class'=>'btn btn-lg btn-success btn-block']) }}
                                <!-- Change this to a button or input when using this as a form -->

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
