/* TaskFlow Custom Styles */

body {
    background-color: #f8f9fa;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.navbar-brand {
    font-weight: bold;
    font-size: 1.5rem;
}

.card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: transform 0.2s;
}

.card:hover {
    transform: translateY(-2px);
}

.card-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 10px 10px 0 0 !important;
}

.btn {
    border-radius: 25px;
    transition: all 0.3s;
}

.btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.badge {
    font-size: 0.75rem;
    padding: 0.375rem 0.75rem;
    border-radius: 15px;
}

.table {
    background: white;
    border-radius: 10px;
    overflow: hidden;
}

.table th {
    background: #f8f9fa;
    border-top: none;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.8rem;
    color: #6c757d;
}

.form-control, .form-select {
    border-radius: 10px;
    border: 1px solid #e9ecef;
    transition: all 0.3s;
}

.form-control:focus, .form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.status-select {
    width: auto;
    min-width: 120px;
}

.alert {
    border: none;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

footer {
    margin-top: auto;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 1rem;
    }
    
    .btn-group {
        flex-direction: column;
    }
    
    .table-responsive {
        font-size: 0.875rem;
    }
}

/* Loading animation */
.loading {
    display: inline-block;
    width: 20px;
    height: 20px;
    border: 3px solid #f3f3f3;
    border-top: 3px solid #667eea;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Task priority indicators */
.priority-high {
    border-left: 4px solid #dc3545;
}

.priority-medium {
    border-left: 4px solid #ffc107;
}

.priority-low {
    border-left: 4px solid #6c757d;
}