<div class="wrap">
    
    <h1>MEU CRUD</h1>

    <br><br>
    <form method="post">
    <table border="1" width="50%">
        <tr>
            <td>Nome</td>
            <td>Telefone</td>
            <td></td>
        </tr>

        <?php
            foreach($contatos as $k =>$v){
                echo "<tr>
                        <td>{$v->nome}</td>
                        <td>{$v->telefone}</td>
                        <td><a href='?page={$_GET['page']}&apagar={$v->id}'>apagar</a></td>
                    </tr>";
            }
        ?>
            <tr>
                <td align="center">Nome:<input type="text" name="nome" placeholder="Preencha o seu nome"></td>
                <td align="center">Telefone:<input type="text" name="telefone" placeholder="telefone"></td>
                <td><?php submit_button('gravar'); ?></td>
            </tr>

        </table>
    </form> 

</div>