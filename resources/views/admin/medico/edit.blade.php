



<div class="container">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="first_name">Nome</label>
            <input type="text" id="first_name" value ="{{ $medico->first_name }}" class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                placeholder="Nome">
                @error('first_name')
                <p style =" color:red;">{{ $message }}</p>
                @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="last_name">Sobrenome</label>
            <input type="text" id="last_name" class="form-control @error('last_name') is-invalid @enderror" 
            name="last_name"
                placeholder="Nome" value ="{{ $medico->last_name }}">
                @error('last_name')
                <p style =" color:red;">{{ $message }}</p>
                @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="genero">Genero</label>
            <select id="genero" class="form-control @error('genero') is-invalid @enderror"
             name="genero">
             <option value ="">--Selecione um genero</option>
             <option value ="m" {{ 'm' == $medico->genero ? 'selected': '' }}>Masculino</option>
             <option value ="f" {{ 'f' == $medico->genero ? 'selected' : ''}}>Feminino</option>
            </select>
                @error('genero')
                <p style =" color:red;">{{ $message }}</p>
                @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="vc_path">Foto</label>
            <input type="file" id="vc_path" class="form-control @error('vc_path') is-invalid @enderror" 
            name="vc_path" value="">
                @error('vc_path')
                <p style =" color:red;">{{ $message }}</p>
                @enderror
        </div>


        <div class="form-group col-md-6">
            <label for="especialidades_id">Especialidade</label>
            <select id="especialidades_id" class="form-control @error('especialidades_id') is-invalid @enderror"
             name="especialidades_id">
             <option value ="">--Selecione uma especialidade</option>
             @foreach($especialidades as $esp)
             <option value ="{{$esp->id}}" {{ $esp->id == $medico->especialidades_id ? 'selected' : '' }}>{{$esp->vc_nome}}</option>
             @endforeach
             </select>
                @error('especialidades_id')
                <p style =" color:red;">{{ $message }}</p>
                @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="areas_id">Area</label>
            <select id="areas_id" class="form-control @error('areas_id') is-invalid @enderror"
             name="areas_id">
             <option value ="">--Selecione uma area</option>
             @foreach($areas as $area)
             <option value ="{{$area->id}}" {{ $area->id == $medico->areas_id ? 'selected' : '' }} >{{$area->vc_nome}}</option>
             @endforeach
            </select>
                @error('areas_id')
                <p style =" color:red;">{{ $message }}</p>
                @enderror
        </div>

        @if(Auth::user()->it_tipo_utilizador == 1)
        <div class="form-group col-md-6">
            <label for="hospitais_id">Hospital</label>
            <select id="hospitais_id" class="form-control @error('hospitais_id') is-invalid @enderror"
             name="hospitais_id">
             <option value ="">--Selecione um hospital</option>
             @foreach($hospitais as $hospital)
             <option value ="{{$hospital->id}}" {{ $hospital->id == $medico->hospitais_id ? 'selected' : '' }} >{{$hospital->nome}}</option>
             @endforeach
            </select>
                @error('hospitais_id')
                <p style =" color:red;">{{ $message }}</p>
                @enderror
        </div>
        @else
        <input name = "hospitais_id" value = "{{ $medico->hospitais_id }}" type = "hidden"/>
        @endif
    </div>
</div>