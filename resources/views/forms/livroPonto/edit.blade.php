<div class="container">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="entrada">Saída</label>
            <input type="time" id="saida" class="form-control" name="saida" placeholder="Saída">
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
            document.getElementById('saida').value = formattedHour + ':' + formattedMinutes;
        </script>         
    </div>
</div>
