document.addEventListener('DOMContentLoaded', function(){
    /**
     * jQuery(function($) {}); добавлено для избежания конфликта
     */
    jQuery(function($) {
        /**
         *  Переменные переданные
         */
        var id_user    = wpMath123UAObj['id_user'],
            session_id = wpMath123UAObj['session_id'],
            url        = wpMath123UAObj['url'];


        if(id_user  !== false && session_id !== false){
            /**
             * Если были переданы идентификатор пользователя и идентификатор сессии,
             * отправляем запрос на проверку действующая ли сесия, если нет зачищаем куки
             * если да получаем данные пользователя
             */

            let div_info = document.querySelector('.header-rigth-singin');

            //spiner_html()
            let
                spiner = div_info.querySelector('.spiner_header'),
                enter  = div_info.querySelector('.header-rigth-login'),
                fio = div_info.querySelector('.header-rigth-singin-fio'),
                info = div_info.querySelector('.heder-rigth-singin-info');

            if(spiner != null){
                spiner.style.display = 'block';
            }

            if(enter != null){
                enter.style.display  = 'none';
            }

            if(fio != null){
                fio.style.display ='none';
            }

            if(info != null){
                info.style.display = 'none';
            }

            if(div_info != null){
                $.ajax({
                    type: 'POST',
                    url: url + '/rest_api/index.php',
                    data: {
                        router: 'auth_id',
                        id_user: id_user,
                        session_id: session_id
                    },
                    success: function (html) {
                        //console.log(session_id);
                        //console.log(id_user);
                        //console.log(html);
                        if(html['access']){
                            let spiner = div_info.querySelector('.spiner_header'),
                                enter  = div_info.querySelector('.header-rigth-login'),
                                fio = div_info.querySelector('.header-rigth-singin-fio'),
                                info = div_info.querySelector('.heder-rigth-singin-info');

                            if(spiner != null){
                                spiner.style.display = 'none';
                            }

                            if(enter != null){
                                enter.style.display  = 'none';
                            }

                            if(fio != null){
                                fio.style.display ='block';
                            }

                            if(info != null){
                                info.style.display = 'flex';
                            }

                            if(fio != null) {

                                let parent_n = div_info.querySelector('#user_name_header'),
                                    parent_s = div_info.querySelector('#user_surname_header'),
                                    message = div_info.querySelector('#user_message_header'),
                                    bills = div_info.querySelector('#user_bills_header'),
                                    progress = div_info.querySelector('#user_progress_header'),
                                    user_menu = document.querySelector('.main-menu-user');

                                parent_n.textContent = html['parent']['name'];
                                parent_s.textContent = html['parent']['surname'];
                                if (html['info']['message'] > 0) {
                                    message.style.display = 'block';
                                    message.textContent = html['info']['message'];
                                }
                                if (html['info']['bills'] > 0) {
                                    bills.style.display = 'block';
                                    bills.textContent = html['info']['bills'];
                                }
                                if (html['info']['progres'] > 0) {
                                    progress.style.display = 'block';
                                    progress.textContent = html['info']['progres'];
                                }
                                if (user_menu != null) {
                                    user_menu.style.display = 'flex';
                                } else {
                                    console.log('Не нашел блдока с пользовательским меню');
                                }
                            }

                        }else{
                            /**
                             * Если авторизация не произошла или устарели куки
                             *
                             * @type {Element | null}
                             */

                            let fio = div_info.querySelector('.header-rigth-singin-fio'),
                                info = div_info.querySelector('.heder-rigth-singin-info'),
                                spiner = div_info.querySelector('.spiner_header'),
                                enter = div_info.querySelector('.enter-login');
                            if(fio != null) {
                                fio.style.display = 'none';
                                info.style.display = 'none';
                                spiner.style.display = 'none';

                                enter.style.display = 'block';
                            }
                        }

                    }, error: function (jqXHR, exception) {
                        view_errors(jqXHR, exception);
                    }
                });
            }
        }

        /**
         * Вывод ошибок
         */
        function view_errors(jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            console.log(msg);
        }

        /**
         * Спинер
         */
        function spiner_html() {
            return '<div class="spinner-border mt-3" role="status" >' +
                '<span class="visually-hidden">Загрузка...</span>' +
                '</div>';
        }
    });
});