<div id="demo-modal" class="fixed inset-0 w-full h-screen bg-black/60 backdrop-blur-md z-[1000] hidden items-center justify-center px-4">
        
    <div id="modal-card" class="bg-[#fcfdfa] text-black w-full max-w-2xl rounded-3xl p-8 md:p-12 shadow-2xl relative transform translate-y-8 opacity-0">
        
        <button id="modal-close-btn" class="absolute top-6 right-6 p-2 text-neutral-400 hover:text-black transition focus:outline-none" aria-label="Close Modal">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl tracking-tight text-neutral-900">
                Book a demo <span class="font-light italic text-neutral-500">with our experts</span>
            </h2>
        </div>

        <div class="mb-8 rounded-2xl border border-neutral-200 bg-neutral-50 px-4 py-4 text-center text-sm text-neutral-600">
            Prefer email? Reach us directly at
            <a href="mailto:Squareone474@gmail.com" class="ml-1 font-semibold text-neutral-900 underline decoration-neutral-300 underline-offset-4">Squareone474@gmail.com</a>
            or
            <a href="mailto:Squareonewww.hot@gmail.com" class="ml-1 font-semibold text-neutral-900 underline decoration-neutral-300 underline-offset-4">Squareonewww.hot@gmail.com</a>
        </div>

        <!-- Success Message -->
        <div id="success-msg" class="hidden bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 text-sm text-center">
            ✅ Thank you! Your request has been sent. We'll get back to you soon.
        </div>

        <!-- Error Message -->
        <div id="error-msg" class="hidden bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 text-sm text-center">
            ❌ Submission failed. Please try again.
        </div>

        <form id="demo-form" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div class="flex flex-col space-y-1.5">
                    <label class="text-[11px] font-bold tracking-wider text-neutral-400 uppercase pl-1">Business Email *</label>
                    <input type="email" id="email" placeholder="Enter your business email" class="w-full bg-transparent border border-neutral-300 rounded-full px-5 py-3.5 text-sm text-neutral-800 placeholder-neutral-400 focus:outline-none focus:border-black transition" required>
                </div>

                <div class="flex flex-col space-y-1.5">
                    <label class="text-[11px] font-bold tracking-wider text-neutral-400 uppercase pl-1">Full Name *</label>
                    <input type="text" id="name" placeholder="Enter your full name" class="w-full bg-transparent border border-neutral-300 rounded-full px-5 py-3.5 text-sm text-neutral-800 placeholder-neutral-400 focus:outline-none focus:border-black transition" required>
                </div>

                <div class="flex flex-col space-y-1.5">
                    <label class="text-[11px] font-bold tracking-wider text-neutral-400 uppercase pl-1">Company Size</label>
                    <div class="relative">
                        <select id="companySize" class="w-full bg-transparent border border-neutral-300 rounded-full px-5 py-3.5 text-sm text-neutral-500 appearance-none focus:outline-none focus:border-black transition cursor-pointer">
                            <option value="" disabled selected>Select the size of your company</option>
                            <option value="1-10">1 - 10 employees</option>
                            <option value="11-50">11 - 50 employees</option>
                            <option value="51-200">51 - 200 employees</option>
                            <option value="201+">201+ employees</option>
                        </select>
                        <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none text-neutral-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col space-y-1.5">
                    <label class="text-[11px] font-bold tracking-wider text-neutral-400 uppercase pl-1">Company Name *</label>
                    <input type="text" id="company" placeholder="Enter your company name" class="w-full bg-transparent border border-neutral-300 rounded-full px-5 py-3.5 text-sm text-neutral-800 placeholder-neutral-400 focus:outline-none focus:border-black transition" required>
                </div>

            </div>

            <div class="flex justify-end pt-4">
                <button type="submit" id="submit-btn" class="bg-[#032b24] text-white font-bold px-8 py-3.5 rounded-full text-sm hover:bg-black transition duration-300 shadow-md flex items-center gap-2">
                    <span id="btn-text">Book a demo</span>
                    <svg id="btn-spinner" class="hidden w-4 h-4 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    (function() {
        const modal = document.getElementById('demo-modal');
        const modalCard = document.getElementById('modal-card');
        const closeBtn = document.getElementById('modal-close-btn');
        const form = document.getElementById('demo-form');
        const submitBtn = document.getElementById('submit-btn');
        const btnText = document.getElementById('btn-text');
        const btnSpinner = document.getElementById('btn-spinner');
        const successMsg = document.getElementById('success-msg');
        const errorMsg = document.getElementById('error-msg');

        // Helper to show/hide modal
        function openModal() {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                modalCard.classList.remove('translate-y-8', 'opacity-0');
                modalCard.classList.add('translate-y-0', 'opacity-100');
            }, 10);
        }

        function closeModal() {
            modalCard.classList.remove('translate-y-0', 'opacity-100');
            modalCard.classList.add('translate-y-8', 'opacity-0');
            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
                // Reset form and messages
                form.reset();
                successMsg.classList.add('hidden');
                errorMsg.classList.add('hidden');
            }, 300);
        }

        // Close on outside click
        modal.addEventListener('click', function(e) {
            if (e.target === modal) closeModal();
        });

        closeBtn.addEventListener('click', closeModal);

        // Form submission
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            // Get values
            const email = document.getElementById('email').value.trim();
            const name = document.getElementById('name').value.trim();
            const companySize = document.getElementById('companySize').value;
            const companyName = document.getElementById('company').value.trim();

            // Hide previous messages
            successMsg.classList.add('hidden');
            errorMsg.classList.add('hidden');

            // Validation
            if (!email || !name || !companyName) {
                alert('Please fill all required fields (*)');
                return;
            }

            const emailPattern = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Please enter a valid email address');
                return;
            }

            // Show loading state
            btnText.classList.add('hidden');
            btnSpinner.classList.remove('hidden');
            submitBtn.disabled = true;

            // Prepare data for Web3Forms
            const formData = new FormData();
            formData.append('access_key', '0ef80b37-9101-46b4-97ba-693a60eb2535');
            formData.append('email', email);
            formData.append('name', name);
            formData.append('company', companyName);
            formData.append('company_size', companySize);
            formData.append('subject', 'New Demo Booking Request');

            try {
                const response = await fetch('https://api.web3forms.com/submit', {
                    method: 'POST',
                    body: formData
                });
                const data = await response.json();

                if (data.success) {
                    // Success
                    successMsg.classList.remove('hidden');
                    form.reset();
                    // Auto close after 2 seconds
                    setTimeout(() => {
                        closeModal();
                    }, 2000);
                } else {
                    errorMsg.classList.remove('hidden');
                }
            } catch (err) {
                errorMsg.classList.remove('hidden');
            } finally {
                // Reset button state
                btnText.classList.remove('hidden');
                btnSpinner.classList.add('hidden');
                submitBtn.disabled = false;
            }
        });

        // Expose openModal to window so you can call it from anywhere
        window.openDemoModal = openModal;
    })();
</script>