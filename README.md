# Sıra Yönetim Sistemi

Bu proje, kullanıcıların kayıt olup sıra numarası alabilecekleri ve sıra numaralarını sorgulayabilecekleri bir web uygulamasıdır. Kullanıcılar, kayıt olmak için kullanıcı adlarını girmekte ve sistem tarafından otomatik olarak oluşturulan bir sıra numarası almaktadırlar. Ayrıca, kullanıcılar sistemdeki sıralamalarını sorgulayabilmektedirler. Proje, PHP ve MySQL veritabanı kullanılarak geliştirilmiştir.

## Kurulum

1. Projenin tüm dosyalarını bir dizine kopyalayın.
2. `inc/connection.php` dosyasını açarak veritabanı bağlantı ayarlarınızı yapın.
3. Web sunucusu üzerinde proje dizinine erişim sağlayın.

## Dosya Yapısı

- `sira.php`: Sıra numaralarını görüntülemek ve kullanıcıları silmek için kullanılan PHP dosyası.
- `kayitol.php`: Kullanıcıların kayıt olmasını sağlayan ve kullanıcı bilgilerini veritabanına ekleyen PHP dosyası.
- `index.php`: Kullanıcıların sıra numaralarını sorgulayabilecekleri ana sayfa.
- `inc/connection.php`: Veritabanı bağlantısı için gerekli PHP dosyası.

## Kullanım

1. Ana sayfada yer alan "Sıra Numarası Sorgula" bağlantısına tıklayarak sıra numarasını sorgulayabilirsiniz.
2. "Sıra Numarası Al" bağlantısına tıklayarak kayıt formuna ulaşabilir ve sıra numarası alabilirsiniz.
3. "Sırayı Görüntüle" bağlantısı yalnızca yerel sunucuda çalışırken mevcuttur ve sıradaki kullanıcıları ve bilgilerini görüntüler.
4. Kayıt formunda kullanıcı adınızı girerek kaydolabilir ve otomatik olarak oluşturulan bir sıra numarası alabilirsiniz.

## Lisans

Bu proje [MIT Lisansı](https://opensource.org/licenses/MIT) altında lisanslanmıştır. Daha fazla bilgi için `LICENSE` dosyasını inceleyebilirsiniz.
