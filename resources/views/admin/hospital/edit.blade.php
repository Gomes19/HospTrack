<div class="col-lg-6">
<div class="form-group">
        <label>Tipo de Hospital</label>
        <select name ="hospital_type" class ="form-control">
                <option value="">--Selecione um tipo</option>
                @foreach($hospital_tipos as $tipo)
                <option value="{{ $tipo->id }}" {{ $tipo->id == $hospital->tipo_hospitais_id ? 'selected': '' }}>{{ $tipo->vc_nome }}</option>
                @endforeach
        </select>
    </div>
    @error('hospital_type')
        <span style ="color: red" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="col-lg-6">
    <div class="form-group">
        <label>Administrador</label>
        <select name ="user_id" class ="form-control">
        <option value="">--Selecione um Administrador</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $user->id == $hospital->user()->where('cargo', '0')->first()->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
        </select>
    </div>
    @error('hospital_servico')
        <span style ="color: red" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="col-lg-6">
    <div class="form-group">
        <label>Serviços Diponíveis</label>
        <select name ="hospital_servico[]" class ="form-control"  multiple>
                @foreach($hospital_servicos as $servico)
                    @foreach($hospital->servicos()->get() as $hServico)
                        <option value="{{ $servico->id }}" {{ $servico->id == $hServico->id ? 'selected' : '' }}>{{ $servico->vc_nome }}</option>
                    @endforeach
                @endforeach
        </select>
    </div>
    @error('hospital_servico')
        <span style ="color: red" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="col-lg-6">
    <div class="form-group">
        <label>Areas Diponíveis</label>
        <select name ="hospital_area[]" class ="form-control"  multiple>
                @foreach($hospital_areas as $area)
                    @foreach($hospital->areas()->get() as $hArea)
                        <option value="{{ $area->id }}" {{ $area->id == $hArea->id ? 'selected' : '' }}>{{ $area->vc_nome }}</option>
                    @endforeach
                @endforeach
        </select>
    </div>
    @error('hospital_area')
        <span style ="color: red" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label>Descrição</label>
    <textarea name="descricao" id="" cols="15" rows="10" class ="form-control" >{{ $hospital->descricao }}</textarea>
</div>
@error('descricao')
    <span style ="color: red" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
<div class="form-group">
    <label>Logotipo</label>
    <input type="file" name ="logotipo" class="form-control">
</div>
@error('logotipo')
    <span style ="color: red" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
<div class="form-group">
    <label>Documento Legal</label>
    <input type="file" name ="documento" class="form-control">
</div>
@error('documento')
    <span style ="color: red" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

<script>
   
</script>
