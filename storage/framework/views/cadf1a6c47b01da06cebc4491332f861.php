

<?php $__env->startSection('title', 'Client Form - Trademark USP'); ?>

<?php $__env->startSection('content'); ?>

<section class="how-it-works-section nother">
    <div class="container">
        <div class="section-header">
            <h2>Start Your Federal Registration: Detailed Intake</h2>
            <p class="subtitle">Ready to File? Complete this form to enable our Trademark Specialists to prepare your application, <br>classify your goods/services, and ensure fast, accurate submission to the USPTO.</p>
        </div>


    </div>
</section>


<section class="form-section">
    <h2 class="recoleta-font">Detailed Trademark Application</h2>

    <form method="POST" action="<?php echo e(route('client.form.submit')); ?>" enctype="multipart/form-data" id="trademarkForm" class="trademark-form louis-george-font">
        <?php echo csrf_field(); ?>
        <div class="form-row two-col">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" placeholder="First Name" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" placeholder="Last Name" required>
            </div>
        </div>

        <div class="form-row three-col">
            <div class="form-group">
                <label for="ownerMark">*Owner Of Mark</label>
                <input type="text" id="ownerMark" name="ownerMark" placeholder="*Owner Of Mark" required>
            </div>
            <div class="form-group">
                <label for="dba">DBA(doing business as)</label>
                <input type="text" id="dba" name="dba" placeholder="DBA(doing business as)">
            </div>
            <div class="form-group">
                <label for="businessName">Business Name</label>
                <input type="text" id="businessName" name="businessName" placeholder="Business Name">
            </div>
        </div>

        <div class="form-row four-col">
            <div class="form-group">
                <label for="bizNature">Business Nature</label>
                <input type="text" id="bizNature" name="bizNature" placeholder="Business Nature" required>
            </div>
            <div class="form-group">
                <label for="mailAddress">*Mailing Address</label>
                <input type="text" id="mailAddress" name="mailAddress" placeholder="*Mailing Address" required>
            </div>
            <div class="form-group">
                <label for="city">*City</label>
                <input type="text" id="city" name="city" placeholder="*City" required>
            </div>
            <div class="form-group">
                <label for="state">*State</label>
                <input type="text" id="state" name="state" placeholder="*State" required>
            </div>
        </div>

        <div class="form-row four-col">
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" id="country" name="country" placeholder="Country" required>
            </div>
            <div class="form-group">
                <label for="zipCode">Zip/Postal Code</label>
                <input type="text" id="zipCode" name="zipCode" placeholder="Zip/Postal Code" required>
            </div>
            <div class="form-group">
                <label for="phoneNumber">*Phone Number</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="*Phone Number" required>
            </div>
            <div class="form-group">
                <label for="website">Website Address</label>
                <input type="url" id="website" name="website" placeholder="Website Address">
            </div>
        </div>

        <div class="form-row three-col">
            <div class="form-group">
                <label for="emailAddress">Email Address</label>
                <input type="email" id="emailAddress" name="emailAddress" placeholder="Email Address" required>
            </div>
            <div class="form-group">
                <label for="trademarkType">I want to Trademark:</label>
                <select id="trademarkType" name="trademarkType">
                    <option>Brand Name</option>
                    <option>Logo</option>
                    <option>Brand Name & Logo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="markDetails">Details of the Mark</label>
                <input type="text" id="markDetails" name="markDetails" placeholder="Details of the Mark">
            </div>
        </div>

        <div class="form-row split-row">
            <div class="form-group wide-group">
                <label for="businessDescription">Please provide description of your business / List of goods offered:</label>
                <textarea id="businessDescription" name="businessDescription" rows="4" placeholder="Please provide description of your business / List of goods and Services" required></textarea>
            </div>
            <div class="form-group narrow-group">
                <label for="usingLogo">Are you currently using your logo?</label>
                <select id="usingLogo" name="usingLogo">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>

        <div class="form-row split-row">
            <div class="form-group wide-group">
                <label for="logoFile">Please attached the file of your logo:</label>
                <input type="file" id="logoFile" name="logoFile">
            </div>
            <div class="form-group narrow-group">
                <label for="usageList">If yes, provide us a list of all places you intend to use your mark*</label>
                <input type="text" id="usageList" name="usageList" placeholder="List of places intended for use">
            </div>
        </div>

        <div class="form-row full-row">
            <div class="form-group">
                <label for="dateOfUse">If No, please provide an expected date of use and list of all places you intend to use in the future*</label>
                <input type="date" id="dateOfUse" name="dateOfUse" placeholder="Date Of Use">
            </div>
        </div>

        <button type="submit" class="submit-btn recoleta-font">SUBMIT</button>
    </form>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\trademark-usp\resources\views/client-form.blade.php ENDPATH**/ ?>