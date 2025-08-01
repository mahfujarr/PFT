<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: /public/auth/login.php');
    exit();
}

$username = htmlspecialchars($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
<?php $title = "Dashboard | Xpense"; ?>
<?php include './components/head.php'; ?>
<?php include './components/navbar.php'; ?>
<link rel="stylesheet" href="/assets/css/dashboard.css">

<body>
    <div class="main-content">
        <div class="dashboard">
            <h2>Welcome, <?php echo $username; ?>!</h2>
            <div class="dashboard-cards">
                <div class="dashboard-card">
                    <h3>Track Expenses</h3>
                    <p>Log and manage your daily expenses easily.</p>
                    <button id="openAddExpenseModal" class="dashboard-btn">Add Expenses</button>
                </div>
                <div class="dashboard-card">
                    <h3>Reports & Stats</h3>
                    <p>View insightful reports and statistics.</p>
                    <a href="#" class="dashboard-btn">View Reports</a>
                </div>
                <div class="dashboard-card">
                    <h3>Manage Categories</h3>
                    <p>Organize your spending by categories.</p>
                    <button id="openManageCategoriesModal" class="dashboard-btn">Manage Categories</button>
                </div>
            </div>
        </div>
    </div>
    <?php include './components/footer.php'; ?>

    <!-- Add Expense Modal -->
    <div id="addExpenseModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" id="closeAddExpenseModal">&times;</span>
            <h2>Add Expense</h2>
            <form id="addExpenseForm">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" required step="0.01" min="0">
                <label for="category">Category:</label>
                <input type="text" id="category" name="category" required>
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="2"></textarea>
                <button type="submit">Add Expense</button>
                <div id="expenseMsg" style="margin-top:10px;"></div>
            </form>
        </div>
    </div>

<!-- Manage Categories Modal -->
<div id="manageCategoriesModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" id="closeManageCategoriesModal">&times;</span>
        <h2>Manage Categories</h2>
        <!-- Add Category Form -->
        <form id="addCategoryForm" style="margin-bottom: 16px;">
            <label for="newCategory">Add New Category:</label>
            <input type="text" id="newCategory" name="newCategory" required>
            <button type="submit">Add Category</button>
            <div id="categoryMsg" style="margin-top:10px;"></div>
        </form>
        <!-- List of Existing Categories -->
        <h3>Existing Categories</h3>
        <ul id="categoryList" style="list-style: none; padding: 0;">
            <!-- Categories will be loaded here dynamically -->
        </ul>
    </div>
</div>

    <script src="/assets/js/dashboard.js"></script>
</body>

</html>