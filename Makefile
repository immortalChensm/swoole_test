srcdir = /home/soft/swoole-src
builddir = /home/soft/swoole-src
top_srcdir = /home/soft/swoole-src
top_builddir = /home/soft/swoole-src
EGREP = /usr/bin/grep -E
SED = /usr/bin/sed
CONFIGURE_COMMAND = './configure' '--with-php-config=/home/study/soft/php/bin/php-config' '--enable-async-redis'
CONFIGURE_OPTIONS = '--with-php-config=/home/study/soft/php/bin/php-config' '--enable-async-redis'
SHLIB_SUFFIX_NAME = so
SHLIB_DL_SUFFIX_NAME = so
ZEND_EXT_TYPE = zend_extension
RE2C = exit 0;
AWK = gawk
SWOOLE_SHARED_LIBADD = -lrt -lhiredis -lz -lstdc++
shared_objects_swoole = swoole.lo swoole_server.lo swoole_server_port.lo swoole_atomic.lo swoole_lock.lo swoole_client.lo swoole_client_coro.lo swoole_coroutine.lo swoole_coroutine_util.lo swoole_event.lo swoole_socket_coro.lo swoole_timer.lo swoole_async.lo swoole_process.lo swoole_process_pool.lo swoole_serialize.lo swoole_buffer.lo swoole_table.lo swoole_http_server.lo swoole_http_v2_server.lo swoole_http_v2_client.lo swoole_http_v2_client_coro.lo swoole_websocket_server.lo swoole_http_client.lo swoole_http_client_coro.lo swoole_mysql.lo swoole_mysql_coro.lo swoole_postgresql_coro.lo swoole_redis.lo swoole_redis_coro.lo swoole_redis_server.lo swoole_mmap.lo swoole_channel.lo swoole_channel_coro.lo swoole_ringqueue.lo swoole_msgqueue.lo swoole_trace.lo swoole_runtime.lo swoole_memory_pool.lo thirdparty/swoole_http_parser.lo thirdparty/multipart_parser.lo src/core/base.lo src/core/log.lo src/core/hashmap.lo src/core/ring_queue.lo src/core/channel.lo src/core/string.lo src/core/array.lo src/core/socket.lo src/core/list.lo src/core/heap.lo src/core/error.lo src/coroutine/base.lo src/coroutine/boost.lo src/coroutine/context.lo src/coroutine/ucontext.lo src/coroutine/socket.lo src/coroutine/channel.lo src/coroutine/hook.lo src/memory/shared_memory.lo src/memory/global_memory.lo src/memory/ring_buffer.lo src/memory/fixed_pool.lo src/memory/malloc.lo src/memory/table.lo src/memory/buffer.lo src/factory/base.lo src/factory/process.lo src/reactor/base.lo src/reactor/select.lo src/reactor/poll.lo src/reactor/epoll.lo src/reactor/kqueue.lo src/pipe/base.lo src/pipe/eventfd.lo src/pipe/unix_socket.lo src/lock/semaphore.lo src/lock/mutex.lo src/lock/rw_lock.lo src/lock/spin_lock.lo src/lock/file_lock.lo src/lock/cond.lo src/network/server.lo src/network/task_worker.lo src/network/client.lo src/network/connection.lo src/network/process_pool.lo src/network/thread_pool.lo src/network/reactor_thread.lo src/network/reactor_process.lo src/network/manager.lo src/network/worker.lo src/network/timer.lo src/network/port.lo src/network/dns.lo src/network/stream.lo src/os/base.lo src/os/msg_queue.lo src/os/sendfile.lo src/os/signal.lo src/os/timer.lo src/protocol/base.lo src/protocol/ssl.lo src/protocol/http.lo src/protocol/http2.lo src/protocol/websocket.lo src/protocol/mqtt.lo src/protocol/socks5.lo src/protocol/mime_types.lo src/protocol/redis.lo src/protocol/base64.lo thirdparty/boost/asm/make_x86_64_sysv_elf_gas.lo thirdparty/boost/asm/jump_x86_64_sysv_elf_gas.lo
PHP_PECL_EXTENSION = swoole
PHP_MODULES = $(phplibdir)/swoole.la
PHP_ZEND_EX =
all_targets = $(PHP_MODULES) $(PHP_ZEND_EX)
install_targets = install-modules install-headers
prefix = /home/study/soft/php
exec_prefix = $(prefix)
libdir = ${exec_prefix}/lib
prefix = /home/study/soft/php
phplibdir = /home/soft/swoole-src/modules
phpincludedir = /home/study/soft/php/include/php
CC = cc
CFLAGS = -Wall -pthread -g -O2
CFLAGS_CLEAN = $(CFLAGS)
CPP = cc -E
CPPFLAGS = -DHAVE_CONFIG_H
CXX = g++
CXXFLAGS = -g -O2 -Wall -Wno-unused-function -Wno-deprecated -Wno-deprecated-declarations -std=c++11
CXXFLAGS_CLEAN = $(CXXFLAGS)
EXTENSION_DIR = /home/study/soft/php/lib/php/extensions/no-debug-non-zts-20170718
PHP_EXECUTABLE = /home/study/soft/php/bin/php
EXTRA_LDFLAGS =
EXTRA_LIBS =
INCLUDES = -I/home/study/soft/php/include/php -I/home/study/soft/php/include/php/main -I/home/study/soft/php/include/php/TSRM -I/home/study/soft/php/include/php/Zend -I/home/study/soft/php/include/php/ext -I/home/study/soft/php/include/php/ext/date/lib -I/home/soft/swoole-src -I/home/soft/swoole-src/include
LFLAGS =
LDFLAGS = -lpthread -z now
SHARED_LIBTOOL =
LIBTOOL = $(SHELL) $(top_builddir)/libtool
SHELL = /bin/sh
INSTALL_HEADERS = ext/swoole/confdefs.h ext/swoole/config.h ext/swoole/php7_wrapper.h ext/swoole/php_swoole.h ext/swoole/swoole_config.h ext/swoole/swoole_coroutine.h ext/swoole/swoole_http.h ext/swoole/swoole_http_client.h ext/swoole/swoole_http_v2_client.h ext/swoole/swoole_mysql.h ext/swoole/swoole_postgresql_coro.h ext/swoole/swoole_serialize.h ext/swoole/include/array.h ext/swoole/include/asm_context.h ext/swoole/include/async.h ext/swoole/include/atomic.h ext/swoole/include/base64.h ext/swoole/include/buffer.h ext/swoole/include/channel.h ext/swoole/include/client.h ext/swoole/include/connection.h ext/swoole/include/context.h ext/swoole/include/coroutine.h ext/swoole/include/error.h ext/swoole/include/file_hook.h ext/swoole/include/hash.h ext/swoole/include/hashmap.h ext/swoole/include/heap.h ext/swoole/include/http.h ext/swoole/include/http2.h ext/swoole/include/list.h ext/swoole/include/mqtt.h ext/swoole/include/rbtree.h ext/swoole/include/redis.h ext/swoole/include/ring_queue.h ext/swoole/include/server.h ext/swoole/include/sha1.h ext/swoole/include/socket.h ext/swoole/include/socket_hook.h ext/swoole/include/socks5.h ext/swoole/include/swoole.h ext/swoole/include/table.h ext/swoole/include/unix.h ext/swoole/include/uthash.h ext/swoole/include/websocket.h ext/swoole/include/win.h
mkinstalldirs = $(top_srcdir)/build/shtool mkdir -p
INSTALL = $(top_srcdir)/build/shtool install -c
INSTALL_DATA = $(INSTALL) -m 644

DEFS = -DPHP_ATOM_INC -I$(top_builddir)/include -I$(top_builddir)/main -I$(top_srcdir)
COMMON_FLAGS = $(DEFS) $(INCLUDES) $(EXTRA_INCLUDES) $(CPPFLAGS) $(PHP_FRAMEWORKPATH)

all: $(all_targets)
	@echo
	@echo "Build complete."
	@echo "Don't forget to run 'make test'."
	@echo

build-modules: $(PHP_MODULES) $(PHP_ZEND_EX)

build-binaries: $(PHP_BINARIES)

libphp$(PHP_MAJOR_VERSION).la: $(PHP_GLOBAL_OBJS) $(PHP_SAPI_OBJS)
	$(LIBTOOL) --mode=link $(CC) $(CFLAGS) $(EXTRA_CFLAGS) -rpath $(phptempdir) $(EXTRA_LDFLAGS) $(LDFLAGS) $(PHP_RPATHS) $(PHP_GLOBAL_OBJS) $(PHP_SAPI_OBJS) $(EXTRA_LIBS) $(ZEND_EXTRA_LIBS) -o $@
	-@$(LIBTOOL) --silent --mode=install cp $@ $(phptempdir)/$@ >/dev/null 2>&1

libs/libphp$(PHP_MAJOR_VERSION).bundle: $(PHP_GLOBAL_OBJS) $(PHP_SAPI_OBJS)
	$(CC) $(MH_BUNDLE_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS) $(LDFLAGS) $(EXTRA_LDFLAGS) $(PHP_GLOBAL_OBJS:.lo=.o) $(PHP_SAPI_OBJS:.lo=.o) $(PHP_FRAMEWORKS) $(EXTRA_LIBS) $(ZEND_EXTRA_LIBS) -o $@ && cp $@ libs/libphp$(PHP_MAJOR_VERSION).so

install: $(all_targets) $(install_targets)

install-sapi: $(OVERALL_TARGET)
	@echo "Installing PHP SAPI module:       $(PHP_SAPI)"
	-@$(mkinstalldirs) $(INSTALL_ROOT)$(bindir)
	-@if test ! -r $(phptempdir)/libphp$(PHP_MAJOR_VERSION).$(SHLIB_DL_SUFFIX_NAME); then \
		for i in 0.0.0 0.0 0; do \
			if test -r $(phptempdir)/libphp$(PHP_MAJOR_VERSION).$(SHLIB_DL_SUFFIX_NAME).$$i; then \
				$(LN_S) $(phptempdir)/libphp$(PHP_MAJOR_VERSION).$(SHLIB_DL_SUFFIX_NAME).$$i $(phptempdir)/libphp$(PHP_MAJOR_VERSION).$(SHLIB_DL_SUFFIX_NAME); \
				break; \
			fi; \
		done; \
	fi
	@$(INSTALL_IT)

install-binaries: build-binaries $(install_binary_targets)

install-modules: build-modules
	@test -d modules && \
	$(mkinstalldirs) $(INSTALL_ROOT)$(EXTENSION_DIR)
	@echo "Installing shared extensions:     $(INSTALL_ROOT)$(EXTENSION_DIR)/"
	@rm -f modules/*.la >/dev/null 2>&1
	@$(INSTALL) modules/* $(INSTALL_ROOT)$(EXTENSION_DIR)

install-headers:
	-@if test "$(INSTALL_HEADERS)"; then \
		for i in `echo $(INSTALL_HEADERS)`; do \
			i=`$(top_srcdir)/build/shtool path -d $$i`; \
			paths="$$paths $(INSTALL_ROOT)$(phpincludedir)/$$i"; \
		done; \
		$(mkinstalldirs) $$paths && \
		echo "Installing header files:          $(INSTALL_ROOT)$(phpincludedir)/" && \
		for i in `echo $(INSTALL_HEADERS)`; do \
			if test "$(PHP_PECL_EXTENSION)"; then \
				src=`echo $$i | $(SED) -e "s#ext/$(PHP_PECL_EXTENSION)/##g"`; \
			else \
				src=$$i; \
			fi; \
			if test -f "$(top_srcdir)/$$src"; then \
				$(INSTALL_DATA) $(top_srcdir)/$$src $(INSTALL_ROOT)$(phpincludedir)/$$i; \
			elif test -f "$(top_builddir)/$$src"; then \
				$(INSTALL_DATA) $(top_builddir)/$$src $(INSTALL_ROOT)$(phpincludedir)/$$i; \
			else \
				(cd $(top_srcdir)/$$src && $(INSTALL_DATA) *.h $(INSTALL_ROOT)$(phpincludedir)/$$i; \
				cd $(top_builddir)/$$src && $(INSTALL_DATA) *.h $(INSTALL_ROOT)$(phpincludedir)/$$i) 2>/dev/null || true; \
			fi \
		done; \
	fi

PHP_TEST_SETTINGS = -d 'open_basedir=' -d 'output_buffering=0' -d 'memory_limit=-1'
PHP_TEST_SHARED_EXTENSIONS =  ` \
	if test "x$(PHP_MODULES)" != "x"; then \
		for i in $(PHP_MODULES)""; do \
			. $$i; $(top_srcdir)/build/shtool echo -n -- " -d extension=$$dlname"; \
		done; \
	fi; \
	if test "x$(PHP_ZEND_EX)" != "x"; then \
		for i in $(PHP_ZEND_EX)""; do \
			. $$i; $(top_srcdir)/build/shtool echo -n -- " -d $(ZEND_EXT_TYPE)=$(top_builddir)/modules/$$dlname"; \
		done; \
	fi`
PHP_DEPRECATED_DIRECTIVES_REGEX = '^(magic_quotes_(gpc|runtime|sybase)?|(zend_)?extension(_debug)?(_ts)?)[\t\ ]*='

test: all
	@if test ! -z "$(PHP_EXECUTABLE)" && test -x "$(PHP_EXECUTABLE)"; then \
		INI_FILE=`$(PHP_EXECUTABLE) -d 'display_errors=stderr' -r 'echo php_ini_loaded_file();' 2> /dev/null`; \
		if test "$$INI_FILE"; then \
			$(EGREP) -h -v $(PHP_DEPRECATED_DIRECTIVES_REGEX) "$$INI_FILE" > $(top_builddir)/tmp-php.ini; \
		else \
			echo > $(top_builddir)/tmp-php.ini; \
		fi; \
		INI_SCANNED_PATH=`$(PHP_EXECUTABLE) -d 'display_errors=stderr' -r '$$a = explode(",\n", trim(php_ini_scanned_files())); echo $$a[0];' 2> /dev/null`; \
		if test "$$INI_SCANNED_PATH"; then \
			INI_SCANNED_PATH=`$(top_srcdir)/build/shtool path -d $$INI_SCANNED_PATH`; \
			$(EGREP) -h -v $(PHP_DEPRECATED_DIRECTIVES_REGEX) "$$INI_SCANNED_PATH"/*.ini >> $(top_builddir)/tmp-php.ini; \
		fi; \
		TEST_PHP_EXECUTABLE=$(PHP_EXECUTABLE) \
		TEST_PHP_SRCDIR=$(top_srcdir) \
		CC="$(CC)" \
			$(PHP_EXECUTABLE) -n -c $(top_builddir)/tmp-php.ini $(PHP_TEST_SETTINGS) $(top_srcdir)/run-tests.php -n -c $(top_builddir)/tmp-php.ini -d extension_dir=$(top_builddir)/modules/ $(PHP_TEST_SHARED_EXTENSIONS) $(TESTS); \
		TEST_RESULT_EXIT_CODE=$$?; \
		rm $(top_builddir)/tmp-php.ini; \
		exit $$TEST_RESULT_EXIT_CODE; \
	else \
		echo "ERROR: Cannot run tests without CLI sapi."; \
	fi

clean:
	find . -name \*.gcno -o -name \*.gcda | xargs rm -f
	find . -name \*.lo -o -name \*.o | xargs rm -f
	find . -name \*.la -o -name \*.a | xargs rm -f
	find . -name \*.so | xargs rm -f
	find . -name .libs -a -type d|xargs rm -rf
	rm -f libphp$(PHP_MAJOR_VERSION).la $(SAPI_CLI_PATH) $(SAPI_CGI_PATH) $(SAPI_MILTER_PATH) $(SAPI_LITESPEED_PATH) $(SAPI_FPM_PATH) $(OVERALL_TARGET) modules/* libs/*

distclean: clean
	rm -f Makefile config.cache config.log config.status Makefile.objects Makefile.fragments libtool main/php_config.h main/internal_functions_cli.c main/internal_functions.c stamp-h buildmk.stamp Zend/zend_dtrace_gen.h Zend/zend_dtrace_gen.h.bak Zend/zend_config.h TSRM/tsrm_config.h
	rm -f php7.spec main/build-defs.h scripts/phpize
	rm -f ext/date/lib/timelib_config.h ext/mbstring/oniguruma/config.h ext/mbstring/libmbfl/config.h ext/oci8/oci8_dtrace_gen.h ext/oci8/oci8_dtrace_gen.h.bak
	rm -f scripts/man1/phpize.1 scripts/php-config scripts/man1/php-config.1 sapi/cli/php.1 sapi/cgi/php-cgi.1 ext/phar/phar.1 ext/phar/phar.phar.1
	rm -f sapi/fpm/php-fpm.conf sapi/fpm/init.d.php-fpm sapi/fpm/php-fpm.service sapi/fpm/php-fpm.8 sapi/fpm/status.html
	rm -f ext/iconv/php_have_bsd_iconv.h ext/iconv/php_have_glibc_iconv.h ext/iconv/php_have_ibm_iconv.h ext/iconv/php_have_iconv.h ext/iconv/php_have_libiconv.h ext/iconv/php_iconv_aliased_libiconv.h ext/iconv/php_iconv_supports_errno.h ext/iconv/php_php_iconv_h_path.h ext/iconv/php_php_iconv_impl.h
	rm -f ext/phar/phar.phar ext/phar/phar.php
	if test "$(srcdir)" != "$(builddir)"; then \
	  rm -f ext/phar/phar/phar.inc; \
	fi
	$(EGREP) define'.*include/php' $(top_srcdir)/configure | $(SED) 's/.*>//'|xargs rm -f

prof-gen:
	CCACHE_DISABLE=1 $(MAKE) PROF_FLAGS=-fprofile-generate all

prof-clean:
	find . -name \*.lo -o -name \*.o | xargs rm -f
	find . -name \*.la -o -name \*.a | xargs rm -f
	find . -name \*.so | xargs rm -f
	rm -f libphp$(PHP_MAJOR_VERSION).la $(SAPI_CLI_PATH) $(SAPI_CGI_PATH) $(SAPI_MILTER_PATH) $(SAPI_LITESPEED_PATH) $(SAPI_FPM_PATH) $(OVERALL_TARGET) modules/* libs/*

prof-use:
	CCACHE_DISABLE=1 $(MAKE) PROF_FLAGS=-fprofile-use all


.PHONY: all clean install distclean test prof-gen prof-clean prof-use
.NOEXPORT:
swoole.lo: /home/soft/swoole-src/swoole.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole.c -o swoole.lo 
swoole_server.lo: /home/soft/swoole-src/swoole_server.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_server.c -o swoole_server.lo 
swoole_server_port.lo: /home/soft/swoole-src/swoole_server_port.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_server_port.c -o swoole_server_port.lo 
swoole_atomic.lo: /home/soft/swoole-src/swoole_atomic.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_atomic.c -o swoole_atomic.lo 
swoole_lock.lo: /home/soft/swoole-src/swoole_lock.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_lock.c -o swoole_lock.lo 
swoole_client.lo: /home/soft/swoole-src/swoole_client.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_client.c -o swoole_client.lo 
swoole_client_coro.lo: /home/soft/swoole-src/swoole_client_coro.cc
	$(LIBTOOL) --mode=compile $(CXX)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CXXFLAGS_CLEAN) $(EXTRA_CXXFLAGS)  -c /home/soft/swoole-src/swoole_client_coro.cc -o swoole_client_coro.lo 
swoole_coroutine.lo: /home/soft/swoole-src/swoole_coroutine.cc
	$(LIBTOOL) --mode=compile $(CXX)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CXXFLAGS_CLEAN) $(EXTRA_CXXFLAGS)  -c /home/soft/swoole-src/swoole_coroutine.cc -o swoole_coroutine.lo 
swoole_coroutine_util.lo: /home/soft/swoole-src/swoole_coroutine_util.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_coroutine_util.c -o swoole_coroutine_util.lo 
swoole_event.lo: /home/soft/swoole-src/swoole_event.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_event.c -o swoole_event.lo 
swoole_socket_coro.lo: /home/soft/swoole-src/swoole_socket_coro.cc
	$(LIBTOOL) --mode=compile $(CXX)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CXXFLAGS_CLEAN) $(EXTRA_CXXFLAGS)  -c /home/soft/swoole-src/swoole_socket_coro.cc -o swoole_socket_coro.lo 
swoole_timer.lo: /home/soft/swoole-src/swoole_timer.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_timer.c -o swoole_timer.lo 
swoole_async.lo: /home/soft/swoole-src/swoole_async.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_async.c -o swoole_async.lo 
swoole_process.lo: /home/soft/swoole-src/swoole_process.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_process.c -o swoole_process.lo 
swoole_process_pool.lo: /home/soft/swoole-src/swoole_process_pool.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_process_pool.c -o swoole_process_pool.lo 
swoole_serialize.lo: /home/soft/swoole-src/swoole_serialize.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_serialize.c -o swoole_serialize.lo 
swoole_buffer.lo: /home/soft/swoole-src/swoole_buffer.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_buffer.c -o swoole_buffer.lo 
swoole_table.lo: /home/soft/swoole-src/swoole_table.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_table.c -o swoole_table.lo 
swoole_http_server.lo: /home/soft/swoole-src/swoole_http_server.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_http_server.c -o swoole_http_server.lo 
swoole_http_v2_server.lo: /home/soft/swoole-src/swoole_http_v2_server.cc
	$(LIBTOOL) --mode=compile $(CXX)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CXXFLAGS_CLEAN) $(EXTRA_CXXFLAGS)  -c /home/soft/swoole-src/swoole_http_v2_server.cc -o swoole_http_v2_server.lo 
swoole_http_v2_client.lo: /home/soft/swoole-src/swoole_http_v2_client.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_http_v2_client.c -o swoole_http_v2_client.lo 
swoole_http_v2_client_coro.lo: /home/soft/swoole-src/swoole_http_v2_client_coro.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_http_v2_client_coro.c -o swoole_http_v2_client_coro.lo 
swoole_websocket_server.lo: /home/soft/swoole-src/swoole_websocket_server.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_websocket_server.c -o swoole_websocket_server.lo 
swoole_http_client.lo: /home/soft/swoole-src/swoole_http_client.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_http_client.c -o swoole_http_client.lo 
swoole_http_client_coro.lo: /home/soft/swoole-src/swoole_http_client_coro.cc
	$(LIBTOOL) --mode=compile $(CXX)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CXXFLAGS_CLEAN) $(EXTRA_CXXFLAGS)  -c /home/soft/swoole-src/swoole_http_client_coro.cc -o swoole_http_client_coro.lo 
swoole_mysql.lo: /home/soft/swoole-src/swoole_mysql.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_mysql.c -o swoole_mysql.lo 
swoole_mysql_coro.lo: /home/soft/swoole-src/swoole_mysql_coro.cc
	$(LIBTOOL) --mode=compile $(CXX)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CXXFLAGS_CLEAN) $(EXTRA_CXXFLAGS)  -c /home/soft/swoole-src/swoole_mysql_coro.cc -o swoole_mysql_coro.lo 
swoole_postgresql_coro.lo: /home/soft/swoole-src/swoole_postgresql_coro.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_postgresql_coro.c -o swoole_postgresql_coro.lo 
swoole_redis.lo: /home/soft/swoole-src/swoole_redis.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_redis.c -o swoole_redis.lo 
swoole_redis_coro.lo: /home/soft/swoole-src/swoole_redis_coro.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_redis_coro.c -o swoole_redis_coro.lo 
swoole_redis_server.lo: /home/soft/swoole-src/swoole_redis_server.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_redis_server.c -o swoole_redis_server.lo 
swoole_mmap.lo: /home/soft/swoole-src/swoole_mmap.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_mmap.c -o swoole_mmap.lo 
swoole_channel.lo: /home/soft/swoole-src/swoole_channel.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_channel.c -o swoole_channel.lo 
swoole_channel_coro.lo: /home/soft/swoole-src/swoole_channel_coro.cc
	$(LIBTOOL) --mode=compile $(CXX)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CXXFLAGS_CLEAN) $(EXTRA_CXXFLAGS)  -c /home/soft/swoole-src/swoole_channel_coro.cc -o swoole_channel_coro.lo 
swoole_ringqueue.lo: /home/soft/swoole-src/swoole_ringqueue.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_ringqueue.c -o swoole_ringqueue.lo 
swoole_msgqueue.lo: /home/soft/swoole-src/swoole_msgqueue.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_msgqueue.c -o swoole_msgqueue.lo 
swoole_trace.lo: /home/soft/swoole-src/swoole_trace.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_trace.c -o swoole_trace.lo 
swoole_runtime.lo: /home/soft/swoole-src/swoole_runtime.cc
	$(LIBTOOL) --mode=compile $(CXX)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CXXFLAGS_CLEAN) $(EXTRA_CXXFLAGS)  -c /home/soft/swoole-src/swoole_runtime.cc -o swoole_runtime.lo 
swoole_memory_pool.lo: /home/soft/swoole-src/swoole_memory_pool.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/swoole_memory_pool.c -o swoole_memory_pool.lo 
thirdparty/swoole_http_parser.lo: /home/soft/swoole-src/thirdparty/swoole_http_parser.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/thirdparty/swoole_http_parser.c -o thirdparty/swoole_http_parser.lo 
thirdparty/multipart_parser.lo: /home/soft/swoole-src/thirdparty/multipart_parser.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/thirdparty/multipart_parser.c -o thirdparty/multipart_parser.lo 
src/core/base.lo: /home/soft/swoole-src/src/core/base.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/core/base.c -o src/core/base.lo 
src/core/log.lo: /home/soft/swoole-src/src/core/log.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/core/log.c -o src/core/log.lo 
src/core/hashmap.lo: /home/soft/swoole-src/src/core/hashmap.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/core/hashmap.c -o src/core/hashmap.lo 
src/core/ring_queue.lo: /home/soft/swoole-src/src/core/ring_queue.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/core/ring_queue.c -o src/core/ring_queue.lo 
src/core/channel.lo: /home/soft/swoole-src/src/core/channel.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/core/channel.c -o src/core/channel.lo 
src/core/string.lo: /home/soft/swoole-src/src/core/string.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/core/string.c -o src/core/string.lo 
src/core/array.lo: /home/soft/swoole-src/src/core/array.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/core/array.c -o src/core/array.lo 
src/core/socket.lo: /home/soft/swoole-src/src/core/socket.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/core/socket.c -o src/core/socket.lo 
src/core/list.lo: /home/soft/swoole-src/src/core/list.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/core/list.c -o src/core/list.lo 
src/core/heap.lo: /home/soft/swoole-src/src/core/heap.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/core/heap.c -o src/core/heap.lo 
src/core/error.lo: /home/soft/swoole-src/src/core/error.cc
	$(LIBTOOL) --mode=compile $(CXX)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CXXFLAGS_CLEAN) $(EXTRA_CXXFLAGS)  -c /home/soft/swoole-src/src/core/error.cc -o src/core/error.lo 
src/coroutine/base.lo: /home/soft/swoole-src/src/coroutine/base.cc
	$(LIBTOOL) --mode=compile $(CXX)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CXXFLAGS_CLEAN) $(EXTRA_CXXFLAGS)  -c /home/soft/swoole-src/src/coroutine/base.cc -o src/coroutine/base.lo 
src/coroutine/boost.lo: /home/soft/swoole-src/src/coroutine/boost.cc
	$(LIBTOOL) --mode=compile $(CXX)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CXXFLAGS_CLEAN) $(EXTRA_CXXFLAGS)  -c /home/soft/swoole-src/src/coroutine/boost.cc -o src/coroutine/boost.lo 
src/coroutine/context.lo: /home/soft/swoole-src/src/coroutine/context.cc
	$(LIBTOOL) --mode=compile $(CXX)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CXXFLAGS_CLEAN) $(EXTRA_CXXFLAGS)  -c /home/soft/swoole-src/src/coroutine/context.cc -o src/coroutine/context.lo 
src/coroutine/ucontext.lo: /home/soft/swoole-src/src/coroutine/ucontext.cc
	$(LIBTOOL) --mode=compile $(CXX)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CXXFLAGS_CLEAN) $(EXTRA_CXXFLAGS)  -c /home/soft/swoole-src/src/coroutine/ucontext.cc -o src/coroutine/ucontext.lo 
src/coroutine/socket.lo: /home/soft/swoole-src/src/coroutine/socket.cc
	$(LIBTOOL) --mode=compile $(CXX)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CXXFLAGS_CLEAN) $(EXTRA_CXXFLAGS)  -c /home/soft/swoole-src/src/coroutine/socket.cc -o src/coroutine/socket.lo 
src/coroutine/channel.lo: /home/soft/swoole-src/src/coroutine/channel.cc
	$(LIBTOOL) --mode=compile $(CXX)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CXXFLAGS_CLEAN) $(EXTRA_CXXFLAGS)  -c /home/soft/swoole-src/src/coroutine/channel.cc -o src/coroutine/channel.lo 
src/coroutine/hook.lo: /home/soft/swoole-src/src/coroutine/hook.cc
	$(LIBTOOL) --mode=compile $(CXX)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CXXFLAGS_CLEAN) $(EXTRA_CXXFLAGS)  -c /home/soft/swoole-src/src/coroutine/hook.cc -o src/coroutine/hook.lo 
src/memory/shared_memory.lo: /home/soft/swoole-src/src/memory/shared_memory.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/memory/shared_memory.c -o src/memory/shared_memory.lo 
src/memory/global_memory.lo: /home/soft/swoole-src/src/memory/global_memory.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/memory/global_memory.c -o src/memory/global_memory.lo 
src/memory/ring_buffer.lo: /home/soft/swoole-src/src/memory/ring_buffer.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/memory/ring_buffer.c -o src/memory/ring_buffer.lo 
src/memory/fixed_pool.lo: /home/soft/swoole-src/src/memory/fixed_pool.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/memory/fixed_pool.c -o src/memory/fixed_pool.lo 
src/memory/malloc.lo: /home/soft/swoole-src/src/memory/malloc.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/memory/malloc.c -o src/memory/malloc.lo 
src/memory/table.lo: /home/soft/swoole-src/src/memory/table.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/memory/table.c -o src/memory/table.lo 
src/memory/buffer.lo: /home/soft/swoole-src/src/memory/buffer.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/memory/buffer.c -o src/memory/buffer.lo 
src/factory/base.lo: /home/soft/swoole-src/src/factory/base.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/factory/base.c -o src/factory/base.lo 
src/factory/process.lo: /home/soft/swoole-src/src/factory/process.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/factory/process.c -o src/factory/process.lo 
src/reactor/base.lo: /home/soft/swoole-src/src/reactor/base.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/reactor/base.c -o src/reactor/base.lo 
src/reactor/select.lo: /home/soft/swoole-src/src/reactor/select.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/reactor/select.c -o src/reactor/select.lo 
src/reactor/poll.lo: /home/soft/swoole-src/src/reactor/poll.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/reactor/poll.c -o src/reactor/poll.lo 
src/reactor/epoll.lo: /home/soft/swoole-src/src/reactor/epoll.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/reactor/epoll.c -o src/reactor/epoll.lo 
src/reactor/kqueue.lo: /home/soft/swoole-src/src/reactor/kqueue.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/reactor/kqueue.c -o src/reactor/kqueue.lo 
src/pipe/base.lo: /home/soft/swoole-src/src/pipe/base.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/pipe/base.c -o src/pipe/base.lo 
src/pipe/eventfd.lo: /home/soft/swoole-src/src/pipe/eventfd.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/pipe/eventfd.c -o src/pipe/eventfd.lo 
src/pipe/unix_socket.lo: /home/soft/swoole-src/src/pipe/unix_socket.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/pipe/unix_socket.c -o src/pipe/unix_socket.lo 
src/lock/semaphore.lo: /home/soft/swoole-src/src/lock/semaphore.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/lock/semaphore.c -o src/lock/semaphore.lo 
src/lock/mutex.lo: /home/soft/swoole-src/src/lock/mutex.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/lock/mutex.c -o src/lock/mutex.lo 
src/lock/rw_lock.lo: /home/soft/swoole-src/src/lock/rw_lock.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/lock/rw_lock.c -o src/lock/rw_lock.lo 
src/lock/spin_lock.lo: /home/soft/swoole-src/src/lock/spin_lock.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/lock/spin_lock.c -o src/lock/spin_lock.lo 
src/lock/file_lock.lo: /home/soft/swoole-src/src/lock/file_lock.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/lock/file_lock.c -o src/lock/file_lock.lo 
src/lock/cond.lo: /home/soft/swoole-src/src/lock/cond.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/lock/cond.c -o src/lock/cond.lo 
src/network/server.lo: /home/soft/swoole-src/src/network/server.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/network/server.c -o src/network/server.lo 
src/network/task_worker.lo: /home/soft/swoole-src/src/network/task_worker.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/network/task_worker.c -o src/network/task_worker.lo 
src/network/client.lo: /home/soft/swoole-src/src/network/client.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/network/client.c -o src/network/client.lo 
src/network/connection.lo: /home/soft/swoole-src/src/network/connection.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/network/connection.c -o src/network/connection.lo 
src/network/process_pool.lo: /home/soft/swoole-src/src/network/process_pool.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/network/process_pool.c -o src/network/process_pool.lo 
src/network/thread_pool.lo: /home/soft/swoole-src/src/network/thread_pool.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/network/thread_pool.c -o src/network/thread_pool.lo 
src/network/reactor_thread.lo: /home/soft/swoole-src/src/network/reactor_thread.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/network/reactor_thread.c -o src/network/reactor_thread.lo 
src/network/reactor_process.lo: /home/soft/swoole-src/src/network/reactor_process.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/network/reactor_process.c -o src/network/reactor_process.lo 
src/network/manager.lo: /home/soft/swoole-src/src/network/manager.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/network/manager.c -o src/network/manager.lo 
src/network/worker.lo: /home/soft/swoole-src/src/network/worker.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/network/worker.c -o src/network/worker.lo 
src/network/timer.lo: /home/soft/swoole-src/src/network/timer.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/network/timer.c -o src/network/timer.lo 
src/network/port.lo: /home/soft/swoole-src/src/network/port.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/network/port.c -o src/network/port.lo 
src/network/dns.lo: /home/soft/swoole-src/src/network/dns.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/network/dns.c -o src/network/dns.lo 
src/network/stream.lo: /home/soft/swoole-src/src/network/stream.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/network/stream.c -o src/network/stream.lo 
src/os/base.lo: /home/soft/swoole-src/src/os/base.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/os/base.c -o src/os/base.lo 
src/os/msg_queue.lo: /home/soft/swoole-src/src/os/msg_queue.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/os/msg_queue.c -o src/os/msg_queue.lo 
src/os/sendfile.lo: /home/soft/swoole-src/src/os/sendfile.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/os/sendfile.c -o src/os/sendfile.lo 
src/os/signal.lo: /home/soft/swoole-src/src/os/signal.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/os/signal.c -o src/os/signal.lo 
src/os/timer.lo: /home/soft/swoole-src/src/os/timer.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/os/timer.c -o src/os/timer.lo 
src/protocol/base.lo: /home/soft/swoole-src/src/protocol/base.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/protocol/base.c -o src/protocol/base.lo 
src/protocol/ssl.lo: /home/soft/swoole-src/src/protocol/ssl.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/protocol/ssl.c -o src/protocol/ssl.lo 
src/protocol/http.lo: /home/soft/swoole-src/src/protocol/http.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/protocol/http.c -o src/protocol/http.lo 
src/protocol/http2.lo: /home/soft/swoole-src/src/protocol/http2.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/protocol/http2.c -o src/protocol/http2.lo 
src/protocol/websocket.lo: /home/soft/swoole-src/src/protocol/websocket.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/protocol/websocket.c -o src/protocol/websocket.lo 
src/protocol/mqtt.lo: /home/soft/swoole-src/src/protocol/mqtt.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/protocol/mqtt.c -o src/protocol/mqtt.lo 
src/protocol/socks5.lo: /home/soft/swoole-src/src/protocol/socks5.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/protocol/socks5.c -o src/protocol/socks5.lo 
src/protocol/mime_types.lo: /home/soft/swoole-src/src/protocol/mime_types.cc
	$(LIBTOOL) --mode=compile $(CXX)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CXXFLAGS_CLEAN) $(EXTRA_CXXFLAGS)  -c /home/soft/swoole-src/src/protocol/mime_types.cc -o src/protocol/mime_types.lo 
src/protocol/redis.lo: /home/soft/swoole-src/src/protocol/redis.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/protocol/redis.c -o src/protocol/redis.lo 
src/protocol/base64.lo: /home/soft/swoole-src/src/protocol/base64.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/src/protocol/base64.c -o src/protocol/base64.lo 
thirdparty/boost/asm/make_x86_64_sysv_elf_gas.lo: /home/soft/swoole-src/thirdparty/boost/asm/make_x86_64_sysv_elf_gas.S
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/thirdparty/boost/asm/make_x86_64_sysv_elf_gas.S -o thirdparty/boost/asm/make_x86_64_sysv_elf_gas.lo 
thirdparty/boost/asm/jump_x86_64_sysv_elf_gas.lo: /home/soft/swoole-src/thirdparty/boost/asm/jump_x86_64_sysv_elf_gas.S
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/soft/swoole-src $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/soft/swoole-src/thirdparty/boost/asm/jump_x86_64_sysv_elf_gas.S -o thirdparty/boost/asm/jump_x86_64_sysv_elf_gas.lo 
$(phplibdir)/swoole.la: ./swoole.la
	$(LIBTOOL) --mode=install cp ./swoole.la $(phplibdir)

./swoole.la: $(shared_objects_swoole) $(SWOOLE_SHARED_DEPENDENCIES)
	$(LIBTOOL) --mode=link $(CXX) $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS) $(LDFLAGS) -o $@ -export-dynamic -avoid-version -prefer-pic -module -rpath $(phplibdir) $(EXTRA_LDFLAGS) $(shared_objects_swoole) $(SWOOLE_SHARED_LIBADD)

