<?php
include '../../../src/config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestedBy = $_POST['requestedBy'];

    $sql = "SELECT requestid, assetname, category, reason, status, createddate 
            FROM assetrequests 
            WHERE requestedby = ? 
            ORDER BY createddate DESC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $requestedBy);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
<tr>
    <td><?php echo htmlspecialchars($row['assetname']); ?></td>
    <td><?php echo htmlspecialchars($row['category']); ?></td>
    <td><?php echo htmlspecialchars($row['reason']); ?></td>
    <td>
        <span class="badge <?php echo getStatusClass($row['status']); ?>">
            <?php echo htmlspecialchars($row['status']); ?>
        </span>
    </td>
    <td><?php echo date("Y-m-d", strtotime($row['createddate'])); ?></td>
    <td>
        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewAssetModal"
            data-assetname="<?php echo htmlspecialchars($row['assetname']); ?>"
            data-category="<?php echo htmlspecialchars($row['category']); ?>"
            data-reason="<?php echo htmlspecialchars($row['reason']); ?>"
            data-status="<?php echo htmlspecialchars($row['status']); ?>"
            data-createddate="<?php echo htmlspecialchars($row['createddate']); ?>">
            View
        </button>

        <!-- <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editAssetModal"
            data-requestid="<?php echo $row['requestid']; ?>"
            data-assetname="<?php echo htmlspecialchars($row['assetname']); ?>"
            data-category="<?php echo htmlspecialchars($row['category']); ?>"
            data-remarks="<?php echo htmlspecialchars($row['reason']); ?>">
            Edit
        </button> -->



    </td>
</tr>
<?php
        }
    } else {
        ?>
<tr>
    <td colspan="6" class="text-center">No asset requests found.</td>
</tr>
<?php
    }

    $stmt->close();
    $conn->close();
}

function getStatusClass($status)
{
    switch ($status) {
        case 'Pending':
            return 'bg-warning';
        case 'In Use':
            return 'bg-success';
        case 'Under Maintenance':
            return 'bg-danger';
        default:
            return 'bg-secondary';
    }
}
?>