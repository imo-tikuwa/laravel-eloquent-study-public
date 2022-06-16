FROM postgres:14.0

RUN localedef -i ja_JP -c -f UTF-8 -A /usr/share/locale/locale.alias ja_JP.UTF-8
ENV LANG ja_JP.utf8

RUN apt-get update && \
    apt-get install -y procps && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* && \
    { \
        echo "alias ll='ls -l --color=auto'"; \
    } >> /root/.bashrc
