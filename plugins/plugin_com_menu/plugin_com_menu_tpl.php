<div class="wrap">
    <h1>Configurações do meu Plugin</h1>
    <br><br>
    <form method="post" action="options.php">
        <label for="token_da_api">Token da API</label>
        <input type="text" id="token_da_api" name="token_da_api">
        <br><br>
        <label for="url_da_api">URL da API</label>
        <input type="text" id="url_da_api" name="url_da_api">
        <br><br>
        <?php submit_button(); ?>
    </form>
</div>