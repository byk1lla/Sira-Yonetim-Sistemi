# Sıra Yönetim Sistemi

Bu proje, kullanıcıların kayıt olup sıra numarası alabilecekleri ve sıra numaralarını sorgulayabilecekleri bir web uygulamasıdır. Kullanıcılar, kayıt olmak için kullanıcı adlarını girmekte ve sistem tarafından otomatik olarak oluşturulan bir sıra numarası almaktadırlar. Ayrıca, kullanıcılar sistemdeki sıralamalarını sorgulayabilmektedirler. Proje, PHP ve MySQL veritabanı kullanılarak geliştirilmiştir.

## Kurulum

1. Projenin tüm dosyalarını bir dizine kopyalayın.
2. `inc/connection.php` dosyasını açarak veritabanı bağlantı ayarlarınızı yapın. Bu dosyada, MySQL sunucu bilgilerinizi (sunucu adı, kullanıcı adı, şifre ve veritabanı adı) ayarlayarak bağlantıyı yapılandırabilirsiniz.
3. Web sunucusu üzerinde proje dizinine erişim sağlayın.

## Dosya Yapısı

- `sira.php`: Sıra numaralarını görüntülemek ve kullanıcıları silmek için kullanılan PHP dosyasıdır. Bu dosyayı düzenleyerek sıradaki kullanıcıları ve bilgilerini görüntülemek için belirli IP adreslerine veya kullanıcılara izin verebilirsiniz.
- `kayitol.php`: Kullanıcıların kayıt olmasını sağlayan ve kullanıcı bilgilerini veritabanına ekleyen PHP dosyasıdır.
- `index.php`: Kullanıcıların sıra numaralarını sorgulayabilecekleri ana sayfadır. Kullanıcılar bu sayfada sıra numaralarını ve kayıtlı oldukları kullanıcı adlarını görebilirler.
- `inc/connection.php`: Veritabanı bağlantısı için gerekli PHP dosyasıdır. Bu dosyada veritabanı sunucusuna bağlanmak için kullanılan ayarlar yer almaktadır.

## Kullanım

1. Ana sayfada yer alan "Sıra Numarası Sorgula" bağlantısına tıklayarak sıra numarasını sorgulayabilirsiniz. Bu sayfada sistemdeki mevcut sıra numaraları ve ilgili kullanıcı adları listelenir.
2. "Sıra Numarası Al" bağlantısına tıklayarak kayıt formuna ulaşabilir ve sıra numarası alabilirsiniz. Kayıt formunda kullanıcı adınızı girerek kaydolabilir ve otomatik olarak oluşturulan bir sıra numarası alabilirsiniz.
3. "Sırayı Görüntüle" bağlantısı yalnızca belirli IP adreslerine veya kullanıcılara izin verir. Bu bağlantıya sadece yetkilendirilmiş kullanıcılar erişebilir ve sıradaki kullanıcıları ve bilgilerini görüntüleyebilir. İzin verilen IP adreslerini veya kullanıcıları belirlemek için `sira.php` dosyasını düzenleyin. Örneğin, `authorizedIPs` değişkenine izin verilen IP adreslerini ekleyebilir veya `authorizedUsers` değişkenine izin verilen kullanıcı adlarını ekleyebilirsiniz.
4. Sıra numarası alırken veya sıradaki kullanıcıları görüntülerken sistem size ilgili mesajları bildirir ve gerekli talimatları sunar.

## Lisans

Bu proje [MIT Lisansı](https://opensource.org/licenses/MIT) altında lisanslanmıştır. Daha fazla bilgi için `LICENSE` dosyasını inceleyebilirsiniz.
