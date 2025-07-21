@extends('layouts.app')

@section('title', $pageTitle)

@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-12">
                    <div class="card mt-4">
                        <div class="card-body p-4">
                            <h5 class="mb-4">{{ isset($cronJob) ? 'Edit Cron Job' : 'Create Cron Job' }}</h5>
                            
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ isset($cronJob) ? route('cron-jobs.update', $cronJob) : route('cron-jobs.store') }}" method="POST" id="cronJobForm">
                                @csrf
                                @if(isset($cronJob))
                                    @method('PUT')
                                @endif
                                
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name', $cronJob->name ?? '') }}" placeholder="Enter cron job name">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="text-danger" id="name-error"></div>
                                        <div class="form-text">
                                            <small class="text-muted">3-255 characters, letters, numbers, spaces, dots, underscores, hyphens only</small>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="schedule_time" class="form-label">Schedule Time <span class="text-danger">*</span></label>
                                        <input type="time" name="schedule_time" id="schedule_time" class="form-control @error('schedule_time') is-invalid @enderror"
                                            value="{{ old('schedule_time', $cronJob->schedule_time ?? '') }}">
                                        @error('schedule_time')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="text-danger" id="schedule_time-error"></div>
                                        <div class="form-text">
                                            <small class="text-muted">Select the time when this job should run daily</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Enter cron job description">{{ old('description', $cronJob->description ?? '') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="text-danger" id="description-error"></div>
                                    <div class="form-text">
                                        <small class="text-muted"><span id="char-count">0</span>/500 characters</small>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="command" class="form-label">Command <span class="text-danger">*</span></label>
                                    <input type="text" name="command" id="command" class="form-control @error('command') is-invalid @enderror"
                                        value="{{ old('command', $cronJob->command ?? '') }}" placeholder="Enter command to execute (e.g., php artisan command:name)">
                                    @error('command')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="text-danger" id="command-error"></div>
                                    <div class="form-text">
                                        <small class="text-muted">3-500 characters, the command that will be executed</small>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Status</label><br>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                            value="1" {{ old('is_active', $cronJob->is_active ?? true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">Active</label>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <div id="validation-status" class="text-muted small">
                                        <i class="fas fa-info-circle"></i> Please fill in all required fields
                                    </div>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('cron-jobs.index') }}" class="btn btn-light px-4 mx-1">Cancel</a>
                                        <button type="submit" class="btn btn-primary px-4 mx-1" id="submitBtn">
                                            {{ isset($cronJob) ? 'Update Cron Job' : 'Create Cron Job' }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('cronJobForm');
            const nameInput = document.getElementById('name');
            const descriptionInput = document.getElementById('description');
            const scheduleTimeInput = document.getElementById('schedule_time');
            const commandInput = document.getElementById('command');
            const isActiveInput = document.getElementById('is_active');
            const submitBtn = document.getElementById('submitBtn');
            const validationStatus = document.getElementById('validation-status');
            const charCountElement = document.getElementById('char-count');
            const isEditMode = {{ isset($cronJob) ? 'true' : 'false' }};

            // Check if all required elements exist
            if (!form || !nameInput || !descriptionInput || !scheduleTimeInput || !commandInput || !submitBtn) {
                console.error('Required form elements not found');
                return;
            }

            // Update character counter
            function updateCharCount() {
                if (charCountElement) {
                    const count = descriptionInput.value.length;
                    charCountElement.textContent = count;
                    
                    // Change color based on length
                    if (count > 450) {
                        charCountElement.style.color = '#dc3545';
                    } else if (count > 400) {
                        charCountElement.style.color = '#ffc107';
                    } else {
                        charCountElement.style.color = '#6c757d';
                    }
                }
            }

            // Real-time validation
            nameInput.addEventListener('blur', function() {
                validateName();
            });

            descriptionInput.addEventListener('blur', function() {
                validateDescription();
            });

            scheduleTimeInput.addEventListener('blur', function() {
                validateScheduleTime();
            });

            commandInput.addEventListener('blur', function() {
                validateCommand();
            });

            // Input event listeners for real-time feedback
            nameInput.addEventListener('input', function() {
                if (nameInput.classList.contains('is-invalid')) {
                    validateName();
                }
            });

            descriptionInput.addEventListener('input', function() {
                updateCharCount();
                if (descriptionInput.classList.contains('is-invalid')) {
                    validateDescription();
                }
            });

            scheduleTimeInput.addEventListener('input', function() {
                if (scheduleTimeInput.classList.contains('is-invalid')) {
                    validateScheduleTime();
                }
            });

            commandInput.addEventListener('input', function() {
                if (commandInput.classList.contains('is-invalid')) {
                    validateCommand();
                }
            });

            // Form submission validation
            form.addEventListener('submit', function(e) {
                let isValid = true;

                if (!validateName()) isValid = false;
                if (!validateDescription()) isValid = false;
                if (!validateScheduleTime()) isValid = false;
                if (!validateCommand()) isValid = false;

                if (!isValid) {
                    e.preventDefault();
                    // Disable submit button temporarily to prevent spam
                    submitBtn.disabled = true;
                    setTimeout(() => {
                        submitBtn.disabled = false;
                    }, 2000);

                    // Scroll to first error
                    const firstError = form.querySelector('.is-invalid');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                } else {
                    // Show loading state
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>' + 
                        (isEditMode ? 'Updating...' : 'Creating...');
                }
            });

            function validateName() {
                const name = nameInput.value.trim();
                const errorElement = document.getElementById('name-error');

                if (name === '') {
                    errorElement.textContent = 'Cron job name is required';
                    nameInput.classList.add('is-invalid');
                    return false;
                } else if (name.length < 3) {
                    errorElement.textContent = 'Cron job name must be at least 3 characters long';
                    nameInput.classList.add('is-invalid');
                    return false;
                } else if (name.length > 255) {
                    errorElement.textContent = 'Cron job name must not exceed 255 characters';
                    nameInput.classList.add('is-invalid');
                    return false;
                } else if (!/^[a-zA-Z0-9\s._-]+$/.test(name)) {
                    errorElement.textContent = 'Cron job name can only contain letters, numbers, spaces, dots, underscores, and hyphens';
                    nameInput.classList.add('is-invalid');
                    return false;
                } else {
                    errorElement.textContent = '';
                    nameInput.classList.remove('is-invalid');
                    return true;
                }
            }

            function validateDescription() {
                const description = descriptionInput.value.trim();
                const errorElement = document.getElementById('description-error');

                if (description === '') {
                    errorElement.textContent = 'Description is required';
                    descriptionInput.classList.add('is-invalid');
                    return false;
                } else if (description.length < 5) {
                    errorElement.textContent = 'Description must be at least 5 characters long';
                    descriptionInput.classList.add('is-invalid');
                    return false;
                } else if (description.length > 500) {
                    errorElement.textContent = 'Description must not exceed 500 characters';
                    descriptionInput.classList.add('is-invalid');
                    return false;
                } else {
                    errorElement.textContent = '';
                    descriptionInput.classList.remove('is-invalid');
                    return true;
                }
            }

            function validateScheduleTime() {
                const scheduleTime = scheduleTimeInput.value.trim();
                const errorElement = document.getElementById('schedule_time-error');

                if (scheduleTime === '') {
                    errorElement.textContent = 'Schedule time is required';
                    scheduleTimeInput.classList.add('is-invalid');
                    return false;
                } else if (!/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/.test(scheduleTime)) {
                    errorElement.textContent = 'Please enter a valid time format (HH:MM)';
                    scheduleTimeInput.classList.add('is-invalid');
                    return false;
                } else {
                    errorElement.textContent = '';
                    scheduleTimeInput.classList.remove('is-invalid');
                    return true;
                }
            }

            function validateCommand() {
                const command = commandInput.value.trim();
                const errorElement = document.getElementById('command-error');

                if (command === '') {
                    errorElement.textContent = 'Command is required';
                    commandInput.classList.add('is-invalid');
                    return false;
                } else if (command.length < 3) {
                    errorElement.textContent = 'Command must be at least 3 characters long';
                    commandInput.classList.add('is-invalid');
                    return false;
                } else if (command.length > 500) {
                    errorElement.textContent = 'Command must not exceed 500 characters';
                    commandInput.classList.add('is-invalid');
                    return false;
                } else {
                    errorElement.textContent = '';
                    commandInput.classList.remove('is-invalid');
                    return true;
                }
            }

            function updateValidationStatus() {
                const isNameValid = nameInput.classList.contains('is-valid') || (!nameInput.classList.contains('is-invalid') && nameInput.value.trim());
                const isDescriptionValid = descriptionInput.classList.contains('is-valid') || (!descriptionInput.classList.contains('is-invalid') && descriptionInput.value.trim());
                const isScheduleTimeValid = scheduleTimeInput.classList.contains('is-valid') || (!scheduleTimeInput.classList.contains('is-invalid') && scheduleTimeInput.value.trim());
                const isCommandValid = commandInput.classList.contains('is-valid') || (!commandInput.classList.contains('is-invalid') && commandInput.value.trim());

                const isValid = isNameValid && isDescriptionValid && isScheduleTimeValid && isCommandValid;

                if (isValid) {
                    validationStatus.innerHTML = '<i class="fas fa-check-circle text-success"></i> All fields are valid';
                    validationStatus.className = 'text-success small';
                } else {
                    validationStatus.innerHTML = '<i class="fas fa-exclamation-triangle text-warning"></i> Please fix validation errors';
                    validationStatus.className = 'text-warning small';
                }
            }

            // Add event listeners for validation status updates
            [nameInput, descriptionInput, scheduleTimeInput, commandInput].forEach(input => {
                input.addEventListener('input', updateValidationStatus);
                input.addEventListener('blur', updateValidationStatus);
            });

            // Initial validation for edit mode
            if (isEditMode) {
                validateName();
                validateDescription();
                validateScheduleTime();
                validateCommand();
            }

            // Initial character count
            updateCharCount();

            // Test validation function for debugging
            window.testCronJobValidation = function() {
                console.log('=== Testing Cron Job Validation ===');
                console.log('Name input:', nameInput.value);
                console.log('Description input:', descriptionInput.value);
                console.log('Schedule time input:', scheduleTimeInput.value);
                console.log('Command input:', commandInput.value);
                
                const nameValid = validateName();
                const descValid = validateDescription();
                const timeValid = validateScheduleTime();
                const cmdValid = validateCommand();
                
                console.log('Name valid:', nameValid);
                console.log('Description valid:', descValid);
                console.log('Schedule time valid:', timeValid);
                console.log('Command valid:', cmdValid);
                
                const formValid = nameValid && descValid && timeValid && cmdValid;
                console.log('Form valid:', formValid);
                
                return formValid;
            };

            console.log('Cron job form validation setup complete');
            console.log('Test validation with: testCronJobValidation()');
        });
    </script>

    <style>
        .form-control.is-invalid {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }
        
        .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        
        .form-control.is-invalid:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
        }
        
        .btn:disabled {
            cursor: not-allowed;
            opacity: 0.6;
        }
        
        .text-danger {
            font-size: 0.875em;
            margin-top: 0.25rem;
        }
        
        .form-check-input:checked {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        
        .form-check-input:focus {
            border-color: #86b7fe;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        #validation-status {
            transition: all 0.3s ease;
        }
        
        #validation-status.text-success {
            font-weight: 500;
        }
        
        #validation-status.text-warning {
            font-weight: 500;
        }

        #char-count {
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .form-text {
            margin-top: 0.25rem;
            font-size: 0.875em;
        }
    </style>
@endsection 