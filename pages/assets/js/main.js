$(document).ready(function() {
    var provinces = ['An Giang', 'Bà rịa – Vũng tàu', 'Bắc Giang', 'Bắc Kạn', 'Bạc Liêu', 'Bắc Ninh', 'Bến Tre', 'Bình Định', 'Bình Dương', 'Bình Phước', 'Bình Thuận', 'Cà Mau', 'Cần Thơ', 'Cao Bằng', 'Đà Nẵng', 'Đắk Lắk', 'Đắk Nông', 'Điện Biên', 'Đồng Nai', 'Đồng Tháp', 'Gia Lai', 'Hà Giang', 'Hà Nam', 'Hà Nội', 'Hà Tĩnh', 'Hải Dương', 'Hải Phòng', 'Hậu Giang', 'Hòa Bình', 'Hưng Yên', 'Khánh Hòa', 'Kiên Giang', 'Kon Tum', 'Lai Châu', 'Lâm Đồng', 'Lạng Sơn', 'Lào Cai', 'Long An', 'Nam Định', 'Nghệ An', 'Ninh Bình', 'Ninh Thuận', 'Phú Thọ', 'Phú Yên', 'Quảng Bình', 'Quảng Nam', 'Quảng Ngãi', 'Quảng Ninh', 'Quảng Trị', 'Sóc Trăng', 'Sơn La', 'Tây Ninh', 'Thái Bình', 'Thái Nguyên', 'Thanh Hóa', 'Thừa Thiên Huế', 'Tiền Giang', 'Thành phố Hồ Chí Minh', 'Trà Vinh', 'Tuyên Quang', 'Vĩnh Long', 'Vĩnh Phúc', 'Yên Bái']
    for (i = 0; i < provinces.length; i++) {
        j = i + 1;
        $('.provinces').append('<option value="' + j + '">' + provinces[i] + '</option>');
    }

    /* Ẩn/hiện nav-submenu */
    $(document).click(function(e) {
        // Đối tượng container chứa popup
        var container = $(".nav-sub");

        // Nếu click bên ngoài đối tượng container thì ẩn nó đi
        if (container.css('display') === 'block') {
            container.slideUp(300);
        }
    });

    $('.js-info-menu').click(function(e) {
        e.stopPropagation();
    })

    $('.nav-sub').click(function(e) {
        e.stopPropagation();
    })

    $('.js-info-menu').click(function() {
            if ($('.nav-sub').css('display') == 'none') {
                $('.nav-sub').slideDown(300);
            } else {
                $('.nav-sub').slideUp(300);
            }
        })
        /*---------------------------------------------------*/

    /*----------- xem mật khẩu -------------------------*/
    $('.show-password').click(function() {
        var parent = $(this).parent();
        input = $(parent).children('input');
        console.log(input)
        if (input.attr('type') === 'password') {
            $(input).attr('type', 'text');
            $(this).children('i').removeClass('fa-eye-slash');
            $(this).children('i').addClass('fa-eye');
        } else {
            $(input).attr('type', 'password')
            $(this).children('i').removeClass('fa-eye');
            $(this).children('i').addClass('fa-eye-slash');
        }
    })


    /*----------- click button lưu trọ ---------------*/
    $('.btn-like-product').click(function() {
        if ($(this).hasClass('active')) {
            $(this).children('i').remove();
            $(this).append('<i class="fa-regular fa-heart"></i>');
            $(this).removeClass('active');
        } else {
            $(this).children('i').remove();
            $(this).append('<i class="fa-solid fa-heart"></i>');
            $(this).addClass('active');
        }
    })

    /*----------- Set background image -------------*/
    $('.set-bg').each(function() {
        var bg = $(this).attr('data-setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    /* Ẩn/hiện các tabs */

    $('.tabs').click(function() {
        $('.tabs.active').removeClass('active');
        $(this).addClass('active');
        console.log($(this).attr('href'));
        var id = $(this).attr('href');

        $('.tab-content').hide();


        $(id).show();

    })

    /* --------------- select tỉnh / quận ------------------*/
    //<![CDATA[
    if (address_2 = localStorage.getItem('address_2_saved')) {
        $('select[name="calc_shipping_district"] option').each(function() {
            if ($(this).text() == address_2) {
                $(this).attr('selected', '')
            }
        })
        $('input.billing_address_2').attr('value', address_2)
    }
    if (district = localStorage.getItem('district')) {
        $('select[name="calc_shipping_district"]').html(district)
        $('select[name="calc_shipping_district"]').on('change', function() {
            var target = $(this).children('option:selected')
            target.attr('selected', '')
            $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
            address_2 = target.text()
            $('input.billing_address_2').attr('value', address_2)
            district = $('select[name="calc_shipping_district"]').html()
            localStorage.setItem('district', district)
            localStorage.setItem('address_2_saved', address_2)
        })
    }
    $('select[name="calc_shipping_provinces"]').each(function() {
            var $this = $(this),
                stc = ''
            c.forEach(function(i, e) {
                e += +1
                stc += '<option value=' + e + '>' + i + '</option>'
                $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
                if (address_1 = localStorage.getItem('address_1_saved')) {
                    $('select[name="calc_shipping_provinces"] option').each(function() {
                        if ($(this).text() == address_1) {
                            $(this).attr('selected', '')
                        }
                    })
                    $('input.billing_address_1').attr('value', address_1)
                }
                $this.on('change', function(i) {
                    i = $this.children('option:selected').index() - 1
                    var str = '',
                        r = $this.val()
                    if (r != '') {
                        arr[i].forEach(function(el) {
                            str += '<option value="' + el + '">' + el + '</option>'
                            $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>' + str)
                        })
                        var address_1 = $this.children('option:selected').text()
                        var district = $('select[name="calc_shipping_district"]').html()
                        localStorage.setItem('address_1_saved', address_1)
                        localStorage.setItem('district', district)
                        $('select[name="calc_shipping_district"]').on('change', function() {
                            var target = $(this).children('option:selected')
                            target.attr('selected', '')
                            $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
                            var address_2 = target.text()
                            $('input.billing_address_2').attr('value', address_2)
                            district = $('select[name="calc_shipping_district"]').html()
                            localStorage.setItem('district', district)
                            localStorage.setItem('address_2_saved', address_2)
                        })
                    } else {
                        $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>')
                        district = $('select[name="calc_shipping_district"]').html()
                        localStorage.setItem('district', district)
                        localStorage.removeItem('address_1_saved', address_1)
                    }
                })
            })
        })
        //]]>

    /*--------------------- show image chỉnh sửa tin đăng--------------- */
    // var reader = new FileReader();
    // var imgGird = $('.js-show-img');

    // $('.js-get-img').change(function(event) {
    //     const files = event.target.files;

    //     $.each(files, function(index, file) {
    //         reader.readAsDataURL(file);

    //         reader.addEventListener('load', (event) => {
    //             const img = document.createElement('img');
    //             imgGrid.append(img);
    //             img.src = this.result;
    //         })
    //     })
    // })

    $('.js-get-img').change(function(event) {
        previewFiles();
        console.log($('.js-get-img').val());
    })

    function previewFiles() {

        const preview = document.querySelector('.js-show-img');
        const files = document.querySelector('.js-get-img').files;

        function readAndPreview(file) {

            // Make sure `file.name` matches our extensions criteria
            if (/\.(jpe?g|png|gif)$/i.test(file.name)) {
                const reader = new FileReader();

                reader.addEventListener("load", function() {
                    const image = new Image();
                    image.src = this.result;
                    preview.appendChild(image);
                }, false);

                reader.readAsDataURL(file);
            }

        }

        if (files) {
            [].forEach.call(files, readAndPreview);
        }

    }
});