<?php if ($this->session->userdata('alert')): ?>
    <div class="toast success-toast bottom-right">
        <span class="toast-message"><?php echo $this->session->userdata('alert'); ?></span>
    </div>
    <script>
        // Show custom toast
        var customToast = document.querySelector(".toast.success-toast");
        customToast.style.display = "block";

        // Hide custom toast after 1 second
        setTimeout(function(){
            customToast.style.opacity = "0";
            setTimeout(function(){
                customToast.style.display = "none";
            }, 1000);
        }, 1000);
    </script>
    <?php $this->session->unset_userdata('alert'); ?>
<?php endif; ?>

<?php if ($this->session->userdata('error')): ?>
    <div class="toast error-toast bottom-right">
        <span class="toast-message"><?php echo $this->session->userdata('error'); ?></span>
    </div>
    <script>
        // Show custom toast
        var customToast = document.querySelector(".toast.error-toast");
        customToast.style.display = "block";

        // Hide custom toast after 1 second
        setTimeout(function(){
            customToast.style.opacity = "0";
            setTimeout(function(){
                customToast.style.display = "none";
            }, 1000);
        }, 1000);
    </script>
    <?php $this->session->unset_userdata('error'); ?>
<?php endif; ?>

<style>
    .toast {
        position: fixed;
        z-index: 9999;
        display: none;
        padding: 10px;
        border-radius: 4px;
        color: #fff;
        font-size: 14px;
        line-height: 1.4;
        opacity: 1;
        transition: opacity 0.5s ease-out;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        width: fit-content;
    }

    .bottom-right {
        bottom: 20px;
        right: 20px;
    }

    .toast-message {
        display: inline-block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        text-align: right;
    }

    .success-toast {
        background-color: #28a745;
    }

    .error-toast {
        background-color: #df4759;
    }
</style>