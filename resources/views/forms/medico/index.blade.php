<div class="container">

    <div class="row">

        <div class="form-group col-md-6">
            <label for="vc_path">Primeiro Nome</label>
            <input type="text" id="first_name" class="form-control" name="first_name" placeholder="Primeiro Nome"
                value="{{ isset($especialidade->first_name) ? $especialidade->first_name : '' }}">

        </div>
        <div class="form-group col-md-6">
            <label for="vc_path">Ultimo Nome</label>
            <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Primeiro Nome"
                value="{{ isset($especialidade->last_name) ? $especialidade->last_name : '' }}">

        </div>
        <div class="form-group col-md-6">
            <label for="inputState">Genêro</label>
            <select id="nivel_acesso" class="form-control" name="genero" style="width: 100%;">
                @isset($medico->genero)
                <option name="genero" value="{{ $especialidade->genero }}">{{ $especialidade->genero }}</option>
                @endisset
               
                <option name="genero" value="Femenino">Femenino</option>

            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="inputState">Especialidaed</label>
            <select id="especialidade_id" class="form-control" name="especialidade_id" style="width: 100%;">
                @isset($medico->especialidade)
                <option name="especialidade_id" value="{{ $medico->especialidade_id }}">{{ $medico->especialidade }}</option>
                @endisset
                @foreach ($especialidades as $especialidade)
                <option name="{{ $especialidade->id }}" value="1">{{ $especialidade->vc_nome }}</option>
                @endforeach
            
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="inputState">Especialidaed</label>
            <select id="area_id" class="form-control" name="area_id" style="width: 100%;">
                @isset($medico->area)
                <option name="area_id" value="{{ $medico->area_id }}">{{ $medico->area }}</option>
                @endisset
                @foreach ($areas as $area)
                <option name="{{ $area->id }}" value="1">{{ $area->vc_nome }}</option>
                @endforeach
            
            </select>
        </div>


        <div class="form-group col-md-6 ">

            <label for="vc_path">Imagem</label>
            <input type="file" id="vc_path" class="form-control" name="vc_path" placeholder="vc_path"
                value="{{ isset($galeria->vc_path) ? $galeria->vc_path : '' }}">
        </div>
      
    </div>
</div>
