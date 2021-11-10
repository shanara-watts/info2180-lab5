        <br>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Continent</th>
                    <th>Independence</th>
                    <th>Head of State</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $country): ?>
                <tr>
                    <td scope="col"><?= $country['name']; ?></td>
                    <td scope="col"><?= $country['continent']; ?></td>
                    <td scope="col"><?= $country['independence_year']; ?></td>
                    <td scope="col"><?= $country['head_of_state']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>