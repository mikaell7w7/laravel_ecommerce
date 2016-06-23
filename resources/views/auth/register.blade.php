@extends('store.store')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Cadastro</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> Ocorreu algum problema com seu login.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Name</label>

							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">

								@if ($errors->has('name'))
									<span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">E-Mail Address</label>

							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">

								@if ($errors->has('email'))
									<span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
								@endif
							</div>
						</div>


						<div class="form-group{{ $errors->has('cnpjcpf') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">CNPJ/CPF</label>

							<div class="col-md-6">
								<input type="number" class="form-control" name="cnpjcpf" value="{{ old('cnpjcpf') }}">

								@if ($errors->has('cnpjcpf'))
									<span class="help-block">
                                        <strong>{{ $errors->first('cnpjcpf') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('inscricao') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Inscrição</label>

							<div class="col-md-6">
								<input type="number" class="form-control" name="inscricao" value="{{ old('inscricao') }}">

								@if ($errors->has('inscricao'))
									<span class="help-block">
                                        <strong>{{ $errors->first('inscricao') }}</strong>
                                    </span>
								@endif
							</div>
						</div>


						<div class="form-group{{ $errors->has('end_rua') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Rua</label>

							<div class="col-md-6">
								<input type="text" class="form-control" name="end_rua" value="{{ old('end_rua') }}">

								@if ($errors->has('end_rua'))
									<span class="help-block">
                                        <strong>{{ $errors->first('end_rua') }}</strong>
                                    </span>
								@endif
							</div>
						</div>


                        <div class="form-group{{ $errors->has('end_bairro') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Bairro</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="end_bairro" value="{{ old('end_bairro') }}">

                                @if ($errors->has('end_bairro'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_bairro') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('end_cidade') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Cidade</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="end_cidade" value="{{ old('end_cidade') }}">

                                @if ($errors->has('end_cidade'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_cidade') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('end_uf') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">UF</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="end_uf" value="{{ old('end_uf') }}">

                                @if ($errors->has('end_uf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_uf') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('end_cep') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">CEP</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="end_cep" value="{{ old('end_cep') }}">

                                @if ($errors->has('end_cep'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_cep') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('end_telefone') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Telefone</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="end_telefone" value="{{ old('end_telefone') }}">

                                @if ($errors->has('end_telefone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_telefone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Password</label>

							<div class="col-md-6">
								<input type="password" class="form-control" name="password">

								@if ($errors->has('password'))
									<span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Confirm Password</label>

							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">

								@if ($errors->has('password_confirmation'))
									<span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-btn fa-user"></i>Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
