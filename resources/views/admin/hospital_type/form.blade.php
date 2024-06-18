
<div class="container">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="vc_nome">Nome</label>
            <input type="text" id="vc_nome" class="form-control @error('vc_nome') is-invalid @enderror" name="vc_nome"
                placeholder="Nome" value="">
                @error('vc_nome')
                <p style =" color:red;">{{ $message }}</p>
                @enderror
        </div>
    </div>
</div>



