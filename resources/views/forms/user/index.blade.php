<div class="container">

    <div class="row">

        <div class="form-group col-md-6">
            <label for="vc_path">Nome</label>
            <input type="text" id="name" class="form-control" name="name" placeholder="Nome">

        </div>
        <div class="form-group col-md-6">
            <label for="vc_path">Email</label>
            <input type="text" id="email" class="form-control" name="email" placeholder="Sub-Categoria"
                value="">

        </div>
        <div class="form-group col-md-6">
            <label for="vc_path">Password</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="Password">

        </div>
        <div class="form-group col-md-6">
            <label for="vc_path">Confirmar Password</label>
            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
                placeholder="Confirmar Password">
        </div>


        <div class="form-group col-md-6 ">

            <label for="vc_path">Foto</label>
            <input type = "file" id="vc_path" class="form-control" name="vc_path" placeholder="vc_path"
                >
        </div>

        <div class="form-group col-md-6">
            <label for="inputState">Nivel de acesso</label>
            <select id="nivel_acesso" class="form-control" name="vc_tipo_utilizador" style="width: 100%;">
                @if(Auth::user()->it_tipo_utilizador == 1)
                <option name="vc_tipo_utilizador" value="1">Admin</option>
                @endif
                <option name="vc_tipo_utilizador" value="2">Admin Hospital</option>
                <option name="vc_tipo_utilizador" value="3">Marc. Pontos</option>
            </select>
        </div>
    </div>
    @if(Auth::user()->it_tipo_utilizador == 1)
    <div class="form-group col-md-6" style = "display:none" id ="hospital_display">
            <label for="inputState">Hospital</label>
            <select id="hospital" class="form-control" name="hospitais_id" style="width: 100%;">
                <option value="">--Selecione um hospital</option>
                @foreach($hospitais as $hospital)
                    <option value="{{ $hospital->id }}">{{ $hospital->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @endif
</div>

@if(Auth::user()->it_tipo_utilizador == 1)
<script>
    var hospital_display = document.getElementById('hospital_display');
    var selectAccess = document.getElementById('nivel_acesso');

    selectAccess.addEventListener('change', function() {
        if (selectAccess.value === '3') {
            hospital_display.style.display = "block";
            hospital_display.required = true;
        } else {
            hospital_display.style.display = "none";
            hospital_display.required = false;
        }
    });
</script>
@else
    <input type="hidden" name = "hospitais_id" value = "{{ Auth::user()->hospital()->first()->id }}">
@endif