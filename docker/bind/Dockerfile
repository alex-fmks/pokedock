FROM ubuntu/bind9
LABEL authors="AlexanderFarmakis"

COPY web.bbq.fwd /var/lib/bind/
COPY named.conf.internal-zone /etc/bind/
RUN echo 'include "/etc/bind/named.conf.internal-zone";' >> /etc/bind/named.conf