        <br>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>District</th>
                    <th>Population</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $city): ?>
                <tr>
                    <td scope="col"><?= $city['name']; ?></td>
                    <td scope="col"><?= $city['district']; ?></td>
                    <td scope="col"><?= $city['population']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>