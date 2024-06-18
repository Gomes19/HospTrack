<div class="container">

    <div class="row">

        <div class="form-group col-md-6">
            <label for="vc_path">Nome</label>
            <input type="text" value = "{{ $user->name }}" class="form-control" name="name" placeholder="Nome">

        </div>
        <div class="form-group col-md-6">
            <label for="vc_path">Email</label>
            <input type="text" value = "{{ $user->email }}"  class="form-control" name="email" placeholder="Sub-Categoria"
                value="">

        </div>
        <div class="form-group col-md-6">
            <label for="vc_path">Password</label>
            <input type="password"  class="form-control" name="password" placeholder="Password">

        </div>
        <div class="form-group col-md-6">
            <label for="vc_path">Confirmar Password</label>
            <input type="password" class="form-control" name="password_confirmation"
                placeholder="Confirmar Password">
        </div>


        <div class="form-group col-md-6 ">

            <label for="vc_path">Foto</label>
            <input type = "file"  class="form-control" name="vc_path" placeholder="vc_path"
                >
        </div>

        <div class="form-group col-md-6">
            <label for="inputState">Nivel de acesso</label>
            <select  id="nivel_acesso{{$user->id}}" class="form-control nivel_acesso" name="vc_tipo_utilizador" style="width: 100%;">
                <option value="">--Selcione um nível de acesso</option>
                @if(Auth::user()->it_tipo_utilizador == 1)
                <option value="1"  {{ $user->it_tipo_utilizador == 1 ? 'selected' : '' }}>Admin</option>
                @endif
                <option value="2" {{ $user->it_tipo_utilizador == 2 ? 'selected' : '' }}>Admin Hospital</option>
                <option value="3" {{ $user->it_tipo_utilizador == 3 ? 'selected' : '' }}>Marc. Pontos</option>
            </select>
        </div>
    </div>

    @if(Auth::user()->it_tipo_utilizador == 1)
    <div class="form-group col-md-6" style = "display:none" id ="hospital_display{{$user->id}}">
            <label for="inputState">Hospital</label>
            <select class="form-control" id  name="hospitais_id" style="width: 100%;">
                <option value="">--Selecione um hospital</option>
                @foreach($hospitais as $hospital)
                    <option value="{{ $hospital->id }}" {{ $user->hospital()->first() ? $hospital->id == $user->hospital()->first()->id  ? 'selected' : '': '' }}>{{ $hospital->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @endif
</div>

