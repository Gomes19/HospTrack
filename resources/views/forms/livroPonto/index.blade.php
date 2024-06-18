<div class="container">

    <div class="row">
        <div class="form-group col-md-6">
            <label for="inputState">Médico</label>
            <select id="medicos_id" class="form-control" name="medicos_id" style="width: 100%;">
                <option value="">--Selecione Um Médico</option>
                @foreach ($medicos as $medico)
                <option value="{{ $medico->id }}"> {{ $medico->id }} | {{ $medico->first_name }} {{ $medico->last_name }}</option>
                @endforeach
            
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="entrada">Entrada</label>
            <input type="time" id="entrada" class="form-control" name="entrada" placeholder="Entrada">
        </div>

        <script>
            // Obtém a data e hora atual
            var currentDate = new Date();

            // Obtém a hora atual em formato de 24 horas
            var currentHour = currentDate.getHours();

            // Obtém os minutos atuais
            var currentMinutes = currentDate.getMinutes();

            // Formata a hora atual para um formato de duas casas decimais
            var formattedHour = currentHour < 10 ? '0' + currentHour : currentHour;
            var formattedMinutes = currentMinutes < 10 ? '0' + currentMinutes : currentMinutes;

            // Define o valor do campo de entrada como a hora e minutos atuais formatados
            document.getElementById('entrada').value = formattedHour + ':' + formattedMinutes;
        </script>         
    </div>
</div>
