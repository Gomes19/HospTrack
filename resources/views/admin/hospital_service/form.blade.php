
<div class="container">
    
<div class="row">
    
 <div class="form-group col-md-6">
    <label for="vc_nome">Nome</label>
       <input type="text" id="vc_nome" class="form-control" name="vc_nome"
           placeholder="Nome" value="">
 </div>
  <div class="form-group col-md-6">
    <label for="hospital_area_id">Área</label>
    <select id="hospital_area_id" class="form-control" name="hospital_area_id" style="width: 100%;" >
        <option value="">--Selecione uma área</option>
        @foreach($areas as $area)
        <option value="{{ $area->id }}">{{ $area->vc_nome }}</option> 
        @endforeach
    </select>
  </div>
    </div>
</div>



