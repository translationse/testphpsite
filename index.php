<?php include('includes/header.php'); ?>

<section class="relative bg-blue-50 py-20 px-6">
    <div class="container mx-auto flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 mb-10 md:mb-0">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 leading-tight mb-4">
                Painless Dental Treatments for a <span class="text-blue-600">Perfect Smile.</span>
            </h2>
            <p class="text-lg text-gray-600 mb-8">Shriram Dental Clinic: Trusted by families in Rajaji Puram, Lucknow for RCT, Implants, and Braces.</p>
            <a href="#book" class="bg-blue-600 text-white px-8 py-4 rounded-lg text-lg font-semibold shadow-lg hover:bg-blue-700 transition">Book Free Consultation</a>
        </div>
        
        <div id="book" class="md:w-1/2 lg:ml-20 w-full bg-white p-8 rounded-2xl shadow-2xl border border-gray-100">
            <h3 class="text-2xl font-bold mb-6 text-gray-800 text-center">Quick Appointment</h3>
            <form action="process_appointment.php" method="POST" class="space-y-4">
                <input type="text" name="name" placeholder="Patient Name" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                <input type="tel" name="phone" placeholder="Phone Number" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                <select name="service" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="General">General Checkup</option>
                    <option value="RCT">Root Canal Treatment (RCT)</option>
                    <option value="Implants">Dental Implants</option>
                    <option value="Braces">Teeth Braces</option>
                </select>
                <textarea name="message" placeholder="Describe your problem (Optional)" class="w-full p-3 border rounded-lg h-24"></textarea>
                <button type="submit" class="w-full medical-blue text-white font-bold py-4 rounded-lg hover:opacity-90 transition">Confirm Booking</button>
            </form>
        </div>
    </div>
</section>

<section id="services" class="py-20 container mx-auto px-6">
    <h3 class="text-3xl font-bold text-center mb-12">Our Specialized Services</h3>
    <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-xl shadow-sm border hover:shadow-md transition">
            <div class="text-blue-500 text-4xl mb-4">🦷</div>
            <h4 class="text-xl font-bold mb-2">Pain-free RCT</h4>
            <p class="text-gray-600">Save your natural tooth with our advanced root canal therapy.</p>
        </div>
        </div>
</section>

<?php include('includes/footer.php'); ?>
