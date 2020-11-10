<link rel="stylesheet" href="../assets/css/home.css">
<section id="home" class="text-center pt-5">
    Bienvenido a TurnApp
    
    <table>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
        </tr>
        <?php foreach($this->companies as $company): ?>
            <tr>
                <td>
                    <?= $company['id']; ?>
                </td>
                <td>
                    <?= $company['name']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>